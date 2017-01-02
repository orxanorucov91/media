<?php
include 'autoloader.php';


use api\NGrams\NGramFactory;

$tokens = ['one','two','three'];

$bigrams = NGramFactory::create($tokens);

var_dump($bigrams);