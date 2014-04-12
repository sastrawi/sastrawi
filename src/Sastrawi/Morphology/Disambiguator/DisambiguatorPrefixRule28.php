<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 28
 * Rule 28 : pen{V} -> pe-n{V}
 */
class DisambiguatorPrefixRule28 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 28
     * Rule 28 : pen{V} -> pe-n{V}
     */
    public function disambiguate($word)
    {
        if (preg_match('/^pen([aiueo])(.*)$/', $word, $matches)) {
            return 'n' . $matches[1] . $matches[2];
        }
    }
}
