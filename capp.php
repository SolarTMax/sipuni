<?php

require __DIR__ . '/vendor/autoload.php';

use Transformer\TextTransformer;

$tt = new TextTransformer($argv[1], ['trim', 'singleSpace']);
print_r($tt->sortCharsInWords()->get());