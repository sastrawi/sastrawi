<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 26a
 * Rule 26a : pem{rV|V} -> pe-m{rV|V}
 */
class DisambiguatorPrefixRule26a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 26a
     * Rule 26a : pem{rV|V} -> pe-m{rV|V}
     */
    public function disambiguate($word)
    {
        if (preg_match('/^pem([aiueo])(.*)$/', $word, $matches)) {
            return 'm' . $matches[1] . $matches[2];
        }
    }
}
