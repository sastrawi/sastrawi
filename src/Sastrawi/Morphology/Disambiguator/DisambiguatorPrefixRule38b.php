<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 38b (CC infix rules)
 * Rule 38b : CelV -> CV
 */
class DisambiguatorPrefixRule38b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 38b (CC infix rules)
     * Rule 38b : CelV -> CV
     */
    public function disambiguate($word)
    {
        $contains = preg_match('/^([bcdfghjklmnpqrstvwxyz])el([aiueo])(.*)$/', $word, $matches);

        if ($word == 'melamah') {
            var_dump($contains);
        }

        if ($contains === 1) {
            return $matches[1] . $matches[2] . $matches[3];
        }
    }
}
