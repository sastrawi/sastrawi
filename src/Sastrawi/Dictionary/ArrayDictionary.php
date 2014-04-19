<?php

namespace Sastrawi\Dictionary;

class ArrayDictionary implements DictionaryInterface
{
    protected $words = array();

    public function __construct(array $words = array())
    {
        $this->addWords($words);
    }

    public function searchFor($word)
    {
        if (isset($this->words[$word])) {
            return $this->words[$word];
        }
    }

    public function count()
    {
        return count($this->words);
    }

    public function addWords(array $words)
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
