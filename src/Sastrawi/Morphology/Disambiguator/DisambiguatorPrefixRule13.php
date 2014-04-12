<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 13
 * Rule 13 : mem{rV|V} -> me-m{rV|V}
 */
class DisambiguatorPrefixRule13 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 13
     * Rule 13 : mem{rV|V} -> me-m{rV|V}
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^mem([aiueo])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return 'm' . $matches[1] . $matches[2];
        }
    }
}
