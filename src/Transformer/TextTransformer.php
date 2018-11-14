<?php

namespace  Transformer;

class TextTransformer {

	const OPTION_METHOD = ['trim', 'singleSpace'];
	private $text = '';

	function __construct($text, $options = []) {

		//mb_internal_encoding("UTF-8"); //??

		$this->text = $text;

		foreach ($options as $method) {
			if (in_array($method, self::OPTION_METHOD)) {
				$this->$method();
			}
		}
	}

	public function get() {
		return $this->text;
	}

	public function trim() {
		$this->text = trim($this->text);
		return $this;
	}

	public function singleSpace() {
		$this->text = preg_replace("/\s{2,}/", ' ', $this->text);
		return $this;
	}

	public function sortCharsInWords() {
		$words = mb_split('\s', $this->text);
		foreach ($words as &$word) {
			$word = $this->sortChars($word);
		}
		$this->text = implode(' ', $words);
		return $this;
	}

	private function sortChars($word) {
		$chars = preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);
		natsort($chars);
		return implode('', $chars);
	}
}