<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 17
 * Rule 17 : mengV -> meng-V
 */
class DisambiguatorPrefixRule17 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 17
     * Rule 17 : mengV -> meng-V
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^meng([aiueo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2];
        }
    }
}
