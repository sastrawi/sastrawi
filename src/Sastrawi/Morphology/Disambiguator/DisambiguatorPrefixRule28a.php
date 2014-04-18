<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 28a
 * Rule 28a : pen{V} -> pe-n{V}
 */
class DisambiguatorPrefixRule28a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 28a
     * Rule 28a : pen{V} -> pe-n{V}
     */
    public function disambiguate($word)
    {
        if (preg_match('/^pen([aiueo])(.*)$/', $word, $matches)) {
            return 'n' . $matches[1] . $matches[2];
        }
    }
}
