<?php

namespace Transformer\Tests;

use PHPUnit\Framework\TestCase;
use Transformer\TextTransformer;

class TextTransformerTest extends TestCase {  
	
    public function testNoChanges() {
        $tt = new TextTransformer('lemon orange banana apple');
        $this->assertEquals($tt->get(), 'lemon orange banana apple');
    }

    public function testTrim() {
        $tt = new TextTransformer('   lemon   orange banana  apple        ', ['trim']);
        $this->assertEquals($tt->get(), 'lemon   orange banana  apple');
    }

    public function testSingleSpace() {
        $tt = new TextTransformer('   lemon  orange     banana    apple        ', ['singleSpace']);
        $this->assertEquals($tt->get(), ' lemon orange banana apple ');
    }

    public function testAllOptions() {
        $tt = new TextTransformer('   lemon  orange     banana    apple        ', ['singleSpace', 'trim']);
        $this->assertEquals($tt->get(), 'lemon orange banana apple');
    }

    public function testExample1() {
        $tt = new TextTransformer('lemon orange banana apple');
        $this->assertEquals($tt->sortCharsInWords()->get(), 'elmno aegnor aaabnn aelpp');
    }

    public function testExample2() {
        $tt = new TextTransformer('лимон апельсин банан яблоко');
        $this->assertEquals($tt->sortCharsInWords()->get(), 'илмно аеилнпсь аабнн бклооя');
    }

    public function testExample3() {
        $tt = new TextTransformer('αβγαβγ αβγαβγαβγ');
        $this->assertEquals($tt->sortCharsInWords()->get(), 'ααββγγ αααβββγγγ');
    }

    public function testSpaces() {
        $tt = new TextTransformer('           ');
        $this->assertEquals($tt->sortCharsInWords()->get(), '           ');
    }
}
