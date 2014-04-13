<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 14
 * Rule 14 : men{c|d|j|z} -> men-{c|d|j|z}
 */
class DisambiguatorPrefixRule14 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 14
     * Rule 14 : men{c|d|j|z} -> men-{c|d|j|z}
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^men([cdjz])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2];
        }
    }
}
