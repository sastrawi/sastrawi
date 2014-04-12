<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 29
 * Rule 29 : peng{g|h|q} -> peng-{g|h|q}
 */
class DisambiguatorPrefixRule29 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 29
     * Rule 29 : peng{g|h|q} -> peng-{g|h|q}
     */
    public function disambiguate($word)
    {
        if (preg_match('/^peng([g|h|q])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }
}
