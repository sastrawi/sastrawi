<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 30a
 * Rule 30a : pengV -> peng-V
 */
class DisambiguatorPrefixRule30a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 30a
     * Rule 30a : pengV -> peng-V
     */
    public function disambiguate($word)
    {
        if (preg_match('/^peng([aiueo])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }
}
