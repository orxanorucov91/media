<?php
require_once 'functions.php';
$suffix = array();
$handle = @fopen("suffix.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle)) !== false) {
        $suffix[] =  $buffer;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}

$words = array();
$handle = @fopen("words.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle)) !== false) {
        $words[] =  $buffer;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}
$word = $_POST['data'];
$find = false;
while($find === false){
//    echo $word;
    foreach($words as $pattern){
        if(preg_match("/".$word."/i", $pattern) > 0){
            $find = true;
            echo $word;
            break;
        }
    }
    
    $word = dividebysuffix($word, $suffix);
}
//echo $word;

//var_dump(dividebysuffix(dividebysuffix("gələcəklər", $suffix),$suffix));


    