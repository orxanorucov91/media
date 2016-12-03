<?php
include 'autoloader.php';


use api\Analysis as Analysis;

$analysis = new Analysis\DataAnalysis();

$word = $_POST["data"];

echo $analysis->getWord($word);