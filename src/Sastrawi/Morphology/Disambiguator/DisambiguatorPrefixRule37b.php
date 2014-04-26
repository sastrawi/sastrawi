<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 37b (CC infix rules)
 * Rule 37b : CerV -> CV
 */
class DisambiguatorPrefixRule37b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 37b (CC infix rules)
     * Rule 37b : CerV -> CV
     */
    public function disambiguate($word)
    {
        $contains = preg_match('/^([bcdfghjklmnpqrstvwxyz])er([aiueo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2] . $matches[3];
        }
    }
}
