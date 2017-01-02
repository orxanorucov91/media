<?php
include 'autoloader.php';


use api\NGrams\NGramFactory;

$data = array();


$token = file_get_contents('news.txt');
$tokens = preg_split('/((^\p{P}+)|(\p{P}*\s+\p{P}*)|(\p{P}+$))/', $token, -1, PREG_SPLIT_NO_EMPTY);

$bigrams = NGramFactory::create($tokens);

var_dump($bigrams);