<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 25
 * Rule 25 : pem{b|f|v} -> pem-{b|f|v}
 */
class DisambiguatorPrefixRule25 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 25
     * Rule 25 : pem{b|f|v} -> pem-{b|f|v}
     */
    public function disambiguate($word)
    {
        if (preg_match('/^pem([bfv])(.*)$/', $word, $matches) === 1) {
            return $matches[1] . $matches[2];
        }
    }
}
