<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 15
 * Rule 15 : men{V} -> me-n{V}
 */
class DisambiguatorPrefixRule15 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 15
     * Rule 15 : men{V} -> me-n{V}
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^men([aiueo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return 'n' . $matches[1] . $matches[2];
        }
    }
}
