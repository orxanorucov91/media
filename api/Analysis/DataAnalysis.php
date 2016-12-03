<?php
namespace api\Analysis;

class DataAnalysis{
    public $suffix=[];
    public $words=[];
    
    public function __construct() {
        $this->readSuffix();
        $this->readWords();
    }
    
    public function readSuffix(){
    $handle = fopen("{$_SERVER['DOCUMENT_ROOT']}/media/suffix.txt", "r");
        if ($handle) {
            while (($buffer = fgets($handle)) !== false) {
                $this->suffix[] =  $buffer;
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }
            fclose($handle);
        }
    }
    
    public function readWords(){
        $handle = fopen("{$_SERVER['DOCUMENT_ROOT']}/media/words.txt", "r");
        if ($handle) {
            while (($buffer = fgets($handle)) !== false) {
                $this->words[] =  $buffer;
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }
            fclose($handle);
        }
    }
    
    public function suffixParser($word){
        $suffix = $this->suffix;
        foreach($suffix as $s){
            $pattern = "/".trim($s)."$/";
            if(preg_match($pattern, $word)){
                $pattern1 = '/'.trim($s).'$/i';
                $word = preg_replace($pattern1, '', $word);
                return $word;
            }
        }
    }
    
    public function getWord($word){
        $find = false;
        $words = $this->words;
        $suffix = $this->suffix;
        while($find === false){
            foreach($words as $pattern){
                if(preg_match("/".$word."/i", $pattern) > 0){
                    $find = true;
                    return $word;
                    break;
                }
            }

            $word = $this->suffixParser($word, $suffix);
        }
    }
}
