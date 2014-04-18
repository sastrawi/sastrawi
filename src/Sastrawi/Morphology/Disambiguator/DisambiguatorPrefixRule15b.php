<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 15b
 * Rule 15 : men{V} -> me-t{V}
 */
class DisambiguatorPrefixRule15b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 15b
     * Rule 15 : men{V} -> me-t{V}
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^men([aiueo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return 't' . $matches[1] . $matches[2];
        }
    }
}
