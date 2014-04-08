<?php

namespace Sastrawi\Dictionary;

class ArrayDictionary implements DictionaryInterface
{
    protected $words = array();
    
    public function __construct(array $words = array())
    {
        $this->exchangeArray($words);
    }

    public function lookup($word)
    {
        if (isset($this->words[$word])) {
            return $this->words[$word];
        }
    }

    public function count()
    {
        return count($this->words);
    }
 
    public function exchangeArray(array $words)
    {
        foreach ($words as $word) {
            $this->add($word);
        }
    }

    public function add($word)
    {
        $this->words[$word] = $word;
    }
}
