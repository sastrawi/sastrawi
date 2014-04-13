<?php

namespace Sastrawi\Stemmer;

use Sastrawi\Dictionary\ArrayDictionary;

class StemmerFactory
{
    public function createStemmer()
    {
        $dictionaryFile = __DIR__ . '/../../../data/kata-dasar.txt';

        if (!is_readable($dictionaryFile)) {
            throw new \Exception('Dictionary file is missing. It seems that your installation is corrupted.');
        }

        $words = explode(PHP_EOL, file_get_contents($dictionaryFile));

        $dictionary = new ArrayDictionary($words);
        $stemmer    = new Stemmer($dictionary);

        return $stemmer;
    }
}
