<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

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
