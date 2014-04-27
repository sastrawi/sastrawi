<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 9
 * Rule 9 : te-C1erC2 -> te-C1erC2 where C1 != 'r'
 */
class DisambiguatorPrefixRule9 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 9
     * Rule 9 : te-C1erC2 -> te-C1erC2 where C1 != 'r'
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^te([bcdfghjklmnpqrstvwxyz])er([bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches);

        if ($contains === 1) {
            if ($matches[1] === 'r') {
                return;
            }

            return $matches[1] . 'er' . $matches[2] . $matches[3];
        }
    }
}
