<?php
include 'autoloader.php';


use api\Tokenizers as Tokenizers;

$s = "Please allow me to introduce myself 
        I'm a man of wealth and taste";
$space = new Tokenizers\WhitespaceTokenizer();
$result = $space->tokenize($s);
var_dump($result);