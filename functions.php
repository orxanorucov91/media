<?php

function dividebysuffix($word, $suffix){
    foreach($suffix as $s){
        $pattern = "/".trim($s)."$/";
        if(preg_match($pattern, $word)){
            $pattern1 = '/'.trim($s).'$/i';
            $word = preg_replace($pattern1, '', $word);
            return $word;
        }
    }
}


function searchbyword($word,$pattern){
    if(preg_match("/açılışlar/i", $pattern, $match)){
       //print_r($match);
       return true;
    }
}
