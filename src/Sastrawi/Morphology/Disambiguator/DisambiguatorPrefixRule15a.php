<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 15a
 * Rule 15a : men{V} -> me-n{V}
 */
class DisambiguatorPrefixRule15a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 15a
     * Rule 15a : men{V} -> me-n{V}
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
