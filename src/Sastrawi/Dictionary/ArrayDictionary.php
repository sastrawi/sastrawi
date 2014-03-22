<?php

namespace Sastrawi\Dictionary;

class ArrayDictionary implements DictionaryInterface
{
    protected $words = array();
    
    public function __construct(array $words)
    {
        foreach ($words as $word) {
            $this->words[$word] = $word;
        }
    }

    public function lookup($word)
    {
        if (isset($this->words[$word])) {
            return $this->words[$word];
        }
    }
}
