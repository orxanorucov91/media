<?php
namespace api\NGrams;

class NGramFactory
{
    const BIGRAM = 2;
    const TRIGRAM = 3;
    

    protected function __construct(){}
    
    static public function create(array $tokens, $nGramSize = self::BIGRAM, $separator = ' ')
    {
        $separatorLength = strlen($separator);
        $length = count($tokens) - $nGramSize + 1;
        if($length < 1) {
            return [];
        }
        $ngrams = array_fill(0, $length, ''); // initialize the array
        
        for($index = 0; $index < $length; $index++)
        {
            for($jindex = 0; $jindex < $nGramSize; $jindex++)
            {
                $ngrams[$index] .= $tokens[$index + $jindex]; 
                if($jindex < $nGramSize - $separatorLength) {
                    $ngrams[$index] .= $separator;
                }
            }
        }
        return $ngrams;
    }
}