<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 30b
 * Rule 30b : pengV -> peng-V
 */
class DisambiguatorPrefixRule30b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 30b
     * Rule 30b : pengV -> peng-kV
     */
    public function disambiguate($word)
    {
        if (preg_match('/^peng([aiueo])(.*)$/', $word, $matches)) {
            return 'k' . $matches[1] . $matches[2];
        }
    }
}
