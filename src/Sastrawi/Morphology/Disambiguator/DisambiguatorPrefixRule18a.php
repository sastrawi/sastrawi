<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 18a
 * CC Rule 18a : menyV -> me-nyV to stem menyala -> nyala
 */
class DisambiguatorPrefixRule18a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 18a
     * CC Rule 18a : menyV -> me-nyV to stem menyala -> nyala
     */
    public function disambiguate($word)
    {
        if (preg_match('/^meny([aiueo])(.*)$/', $word, $matches)) {
            return 'ny' . $matches[1] . $matches[2];
        }
    }
}
