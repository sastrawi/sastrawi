<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 34
 * Rule 34 : peCP -> pe-CP where C != {r|w|y|l|m|n} and P != 'er'
 */
class DisambiguatorPrefixRule34 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 34
     * Rule 34 : peCP -> pe-CP where C != {r|w|y|l|m|n} and P != 'er'
     */
    public function disambiguate($word)
    {
        if (preg_match('/^pe([bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches)) {
            if (preg_match('/^er(.*)$/', $matches[2]) === 1) {
                return;
            }

            return $matches[1] . $matches[2];
        }
    }
}
