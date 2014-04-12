<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 30
 * Rule 30 : pengV -> peng-V
 */
class DisambiguatorPrefixRule30 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 30
     * Rule 30 : pengV -> peng-V
     */
    public function disambiguate($word)
    {
        if (preg_match('/^peng([aiueo])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }
}
