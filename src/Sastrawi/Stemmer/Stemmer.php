<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer;

use Sastrawi\Dictionary\DictionaryInterface;
use Sastrawi\Stemmer\Context\Context;
use Sastrawi\Stemmer\Context\Visitor\VisitorProvider;

/**
 * Indonesian Stemmer.
 * Nazief & Adriani, CS Stemmer, ECS Stemmer, Improved ECS.
 *
 * @link https://github.com/sastrawi/sastrawi/wiki/Resources
 */
class Stemmer implements StemmerInterface
{
    /**
     * The dictionary containing root words
     *
     * @var \Sastrawi\Dictionary\DictionaryInterface
     */
    protected $dictionary;

    /**
     * Visitor provider
     *
     * @var \Sastrawi\Stemmer\Context\Visitor\VisitorProvider
     */
    protected $visitorProvider;

    public function __construct(DictionaryInterface $dictionary)
    {
        $this->dictionary      = $dictionary;
        $this->visitorProvider = new VisitorProvider();
    }

    /**
     * @return \Sastrawi\Dictionary\DictionaryInterface
     */
    public function getDictionary()
    {
        return $this->dictionary;
    }

    /**
     * Stem a text string to its common stem form.
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

    /**
     * Stem a word to its common stem form.
     *
     * @param  string $word the word to stem, e.g : memberdayakan
     * @return string common stem form, e.g : daya
     */
    protected function stemWord($word)
    {
        if ($this->isPlural($word)) {
            return $this->stemPluralWord($word);
        } else {
            return $this->stemSingularWord($word);
        }
    }

    /**
     * @param  string  $word
     * @return boolean
     */
    protected function isPlural($word)
    {
        // -ku|-mu|-nya
        // nikmat-Ku, etc
        if (preg_match('/^(.*)-(ku|mu|nya|lah|kah|tah|pun)$/', $word, $words)) {
            return strpos($words[1], '-') !== false;
        }

        return strpos($word, '-') !== false;
    }

    /**
     * Stem a plural word to its common stem form.
     * Asian J. (2007) “Effective Techniques for Indonesian Text Retrieval” page 76-77.
     *
     * @param  string $plural the word to stem, e.g : bersama-sama
     * @return string common stem form, e.g : sama
     * @link   http://researchbank.rmit.edu.au/eserv/rmit:6312/Asian.pdf
     */
    protected function stemPluralWord($plural)
    {
        preg_match('/^(.*)-(.*)$/', $plural, $words);

        if (!isset($words[1]) || !isset($words[2])) {
            return $plural;
        }

        // malaikat-malaikat-nya -> malaikat malaikat-nya
        $suffix = $words[2];
        if (in_array($suffix, array('ku', 'mu', 'nya', 'lah', 'kah', 'tah', 'pun')) &&
            preg_match('/^(.*)-(.*)$/', $words[1], $words)) {
            $words[2] .= '-' . $suffix;
        }

        // berbalas-balasan -> balas
        $rootWord1 = $this->stemSingularWord($words[1]);
        $rootWord2 = $this->stemSingularWord($words[2]);

        // meniru-nirukan -> tiru
        if (!$this->dictionary->contains($words[2]) && $rootWord2 === $words[2]) {
            $rootWord2 = $this->stemSingularWord('me' . $words[2]);
        }

        if ($rootWord1 == $rootWord2) {
            return $rootWord1;
        } else {
            return $plural;
        }
    }

    /**
     * Stem a singular word to its common stem form.
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
