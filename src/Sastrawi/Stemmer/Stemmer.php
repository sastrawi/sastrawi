<?php

namespace Sastrawi\Stemmer;

use Sastrawi\Dictionary\DictionaryInterface;
use Sastrawi\Stemmer\Context\Context;
use Sastrawi\Stemmer\Context\Visitor\VisitorProvider;

class Stemmer
{
    protected $dictionary;

    protected $visitorProvider;

    public function __construct(DictionaryInterface $dictionary)
    {
        $this->dictionary = $dictionary;
        $this->visitorProvider = new VisitorProvider;
    }

    public function getDictionary()
    {
        return $this->dictionary;
    }

    /**
     * Stem a text string to its common stem form
     *
     * @param  string $text the text string to stem, e.g : memberdayakan pembangunan
     * @return string common stem form, e.g : daya bangun
     */
    public function stem($text)
    {
        $normalizedText = Filter\TextNormalizer::normalizeText($text);

        $words = explode(' ', $normalizedText);
        $stems = array();

        foreach ($words as $word) {
            $stems[] = $this->stemWord($word);
        }

        return implode(' ', $stems);
    }

    protected function stemWord($word)
    {
        if ($this->isPlural($word)) {
            return $this->stemPluralWord($word);
        } else {
            return $this->stemSingularWord($word);
        }
    }

    protected function isPlural($word)
    {
        return strpos($word, '-') !== false;
    }

    protected function stemPluralWord($plural)
    {
        preg_match('/^(.*)-(.*)$/', $plural, $words);

        if (!isset($words[1]) || !isset($words[2])) {
            return $plural;
        }

        $rootWord1 = $this->stemSingularWord($words[1]);
        $rootWord2 = $this->stemSingularWord($words[2]);

        if ($rootWord1 == $rootWord2) {
            return $rootWord1;
        }

        return $plural;
    }

    /**
     * Stem a singular word to its common stem form
     *
     * @param  string $word the word to stem, e.g : mengalahkan
     * @return string common stem form, e.g : kalah
     */
    protected function stemSingularWord($word)
    {
        $context = new Context($word, $this->dictionary, $this->visitorProvider);
        $context->execute();

        return $context->getResult();
    }
}
