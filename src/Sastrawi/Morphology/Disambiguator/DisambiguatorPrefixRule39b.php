<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 39b (CC infix rules)
 * Rule 39b : CemV -> CV
 */
class DisambiguatorPrefixRule39b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 39b (CC infix rules)
     * Rule 39b : CemV -> CV
     */
    public function disambiguate($word)
    {
        $contains = preg_match('/^([bcdfghjklmnpqrstvwxyz])em([aiueo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2] . $matches[3];
        }
    }
}
