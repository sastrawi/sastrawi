<?php

namespace Sastrawi\StopWordRemover;

use Sastrawi\Dictionary\DictionaryInterface;

class StopWordRemover
{
    /**
     * @var \Sastrawi\Dictionary\DictionaryInterface
     */
    protected $dictionary;

    public function __construct(DictionaryInterface $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    /**
     * @return \Sastrawi\Dictionary\DictionaryInterface
     */
    public function getDictionary()
    {
        return $this->dictionary;
    }

    /**
     * Remove stop words.
     *
     * @param  string $text The text which stop words to be removed
     * @return string The text after removal
     */
    public function remove($text)
    {
        $words = explode(' ', $text);

        foreach ($words as $i => $word) {
            if ($this->dictionary->contains($word)) {
                unset($words[$i]);
            }
        }

        return implode(' ', $words);
    }
}
