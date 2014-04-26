<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 37a (CC infix rules)
 * Rule 37a : CerV -> CerV
 */
class DisambiguatorPrefixRule37a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 37a (CC infix rules)
     * Rule 37a : CerV -> CerV
     */
    public function disambiguate($word)
    {
        $contains = preg_match('/^([bcdfghjklmnpqrstvwxyz])(er[aiueo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2] . $matches[3];
        }
    }
}
