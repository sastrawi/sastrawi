<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 17c
 * Rule 17c : mengV -> mengV- where V = 'e'
 */
class DisambiguatorPrefixRule17c implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 17c
     * Rule 17c : mengV -> mengV- where V = 'e'
     */
    public function disambiguate($word)
    {
        if (preg_match('/^menge(.*)$/', $word, $matches)) {
            return $matches[1];
        }
    }
}
