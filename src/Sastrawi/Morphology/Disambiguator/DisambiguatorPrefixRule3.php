<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
* Disambiguate Prefix Rule 3
* Rule 3 : berCAerV -> ber-CAerV where C != 'r'
*
*/
class DisambiguatorPrefixRule3 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 3
     * Rule 3 : berCAerV -> ber-CAerV where C != 'r'
     * return string|null
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^ber([bcdfghjklmnpqrstvwxyz])([a-z])er([aiueo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            if ($matches[1] === 'r') {
                return;
            }

            return $matches[1] . $matches[2] . 'er' . $matches[3] . $matches[4];
        }
    }
}
