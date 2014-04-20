<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 31
 * Rule 31 : penyV -> peny-sV
 */
class DisambiguatorPrefixRule31 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 31
     * Rule 31 : penyV -> peny-sV
     */
    public function disambiguate($word)
    { 
        if (preg_match('/^peny([aiueo])(.*)$/', $word, $matches)) {
            return 's' . $matches[1] . $matches[2];
        }
    }
}
