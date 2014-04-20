<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 18
 * Rule 18 : menyV -> meny-sV
 */
class DisambiguatorPrefixRule18 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 18
     * Rule 18 : menyV -> meny-sV
     */
    public function disambiguate($word)
    {
        $matches  = null;

        if (preg_match('/^meny([aiueo])(.*)$/', $word, $matches)) {
            return 's' . $matches[1] . $matches[2];
        }
    }
}
