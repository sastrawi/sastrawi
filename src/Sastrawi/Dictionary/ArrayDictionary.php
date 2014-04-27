<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Dictionary;

class ArrayDictionary implements DictionaryInterface
{
    protected $words = array();

    public function __construct(array $words = array())
    {
        $this->addWords($words);
    }

    public function contains($word)
    {
        return isset($this->words[$word]);
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
