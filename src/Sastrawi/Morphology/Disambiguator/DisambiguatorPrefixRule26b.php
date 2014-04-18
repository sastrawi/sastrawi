<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 26b
 * Rule 26b : pem{rV|V} -> pe-p{rV|V}
 */
class DisambiguatorPrefixRule26b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 26b
     * Rule 26b : pem{rV|V} -> pe-p{rV|V}
     */
    public function disambiguate($word)
    {
        if (preg_match('/^pem([aiueo])(.*)$/', $word, $matches)) {
            return 'p' . $matches[1] . $matches[2];
        }
    }
}
