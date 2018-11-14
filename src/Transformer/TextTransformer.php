<?php

namespace  Transformer;


/**
* Transform text
* @package Transformer
* @version 1.0
* @author Nesterov Max <menesterov@gmail.com>
*/
class TextTransformer {

	const OPTION_METHOD = ['trim', 'singleSpace'];
	private $text = '';

	/**
	* Create TextTransformer for text
	* @param string $text Initial text
	* @param array $options Methods for initial text transformation
	* @return TextTransformer
	*/
	function __construct($text, $options = []) {

		$this->text = strval($text);

		foreach ($options as $method) {
			if (in_array($method, self::OPTION_METHOD)) {
				$this->$method();
			}
		}
	}


	/**
	* Get current text
	* @return string text
	*/
	public function get() {
		return $this->text;
	}

	/**
	* Trim spaces in current text
	* @return TextTransformer (self)
	*/
	public function trim() {
		$this->text = trim($this->text);
		return $this;
	}

	/**
	* Fix double spaces to mono space inside current text
	* @return TextTransformer (self)
	*/
	public function singleSpace() {
		$this->text = preg_replace("/\s{2,}/", ' ', $this->text);
		return $this;
	}

	/**
	* Sort chars in every word for current text
	* @return TextTransformer (self)
	*/
	public function sortCharsInWords() {
		$words = mb_split('\s', $this->text);
		foreach ($words as &$word) {
			$word = $this->sortChars($word);
		}
		$this->text = implode(' ', $words);
		return $this;
	}

	/**
	* Sort chars in every word for current text
	* @param string $word A unit word
	* @return string Word with sorted chars 
	*/
	private function sortChars($word) {
		$chars = preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);
		natsort($chars);
		return implode('', $chars);
	}
}