<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 31a
 * CC Rule 31a : penyV -> pe-nyV
 */
class DisambiguatorPrefixRule31a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 31a
     * CC Rule 31a : penyV -> pe-nyV
     */
    public function disambiguate($word)
    {
        if (preg_match('/^peny([aiueo])(.*)$/', $word, $matches)) {
            return 'ny' . $matches[1] . $matches[2];
        }
    }
}
