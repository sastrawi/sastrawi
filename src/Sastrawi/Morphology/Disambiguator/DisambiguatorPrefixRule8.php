<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 8
 * Rule 8 : terCP -> ter-CP where C != 'r' and P != 'er'
 */
class DisambiguatorPrefixRule8 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 8
     * Rule 8 : terCP -> ter-CP where C != 'r' and P != 'er'
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^ter([bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches);

        if ($contains === 1) {
            if ($matches[1] === 'r' || preg_match('/^er(.*)$/', $matches[2]) === 1) {
                return;
            }

            return $matches[1] . $matches[2];
        }
    }
}
