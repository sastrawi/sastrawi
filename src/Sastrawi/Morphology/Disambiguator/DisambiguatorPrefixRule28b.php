<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 28b
 * Rule 28b : pen{V} -> pe-t{V}
 */
class DisambiguatorPrefixRule28b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 28b
     * Rule 28b : pen{V} -> pe-t{V}
     */
    public function disambiguate($word)
    {
        if (preg_match('/^pen([aiueo])(.*)$/', $word, $matches)) {
            return 't' . $matches[1] . $matches[2];
        }
    }
}
