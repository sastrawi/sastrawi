<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 7
 * Rule 7 : terCerv -> ter-CerV where C != 'r'
 */
class DisambiguatorPrefixRule7 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 7
     * Rule 7 : terCerv -> ter-CerV where C != 'r'
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^ter([bcdfghjklmnpqrstvwxyz])er([aiueo].*)$/', $word, $matches);
        
        if ($contains === 1) {
            if ($matches[1] === 'r') {
                return;
            }
            
            return $matches[1] . 'er' . $matches[2];
        }
    }
}
