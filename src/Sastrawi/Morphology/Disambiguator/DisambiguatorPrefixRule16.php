<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 16
 * Rule 16 : meng{g|h|q} -> meng-{g|h|q}
 */
class DisambiguatorPrefixRule16 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 16
     * Rule 16 : meng{g|h|q} -> meng-{g|h|q}
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^meng([g|h|q])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return $matches[1] . $matches[2];
        }
    }
}
