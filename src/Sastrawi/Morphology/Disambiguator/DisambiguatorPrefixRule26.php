<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 26
 * Rule 26 : pem{rV|V} -> pe-m{rV|V}
 */
class DisambiguatorPrefixRule26 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 26
     * Rule 26 : pem{rV|V} -> pe-m{rV|V}
     */
    public function disambiguate($word)
    {
        if (preg_match('/^pem([aiueo])(.*)$/', $word, $matches)) {
            return 'm' . $matches[1] . $matches[2];
        }
    }
}
