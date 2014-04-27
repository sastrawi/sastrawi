<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
* Disambiguate Prefix Rule 2
* Rule 2 : berCAP -> ber-CAP where C != 'r' AND P != 'er'
*/
class DisambiguatorPrefixRule2 implements DisambiguatorInterface
{
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^ber([bcdfghjklmnpqrstvwxyz])([a-z])(.*)$/', $word, $matches);

        if ($contains === 1) {
            if (preg_match('/^er(.*)$/', $matches[3]) === 1) {
                return;
            }

            return $matches[1] . $matches[2] . $matches[3];
        }
    }
}
