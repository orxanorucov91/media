<?php
include 'autoloader.php';


use api\Analysis as Analysis;

$analysis = new Analysis\DataAnalysis();

var_dump($analysis->words);