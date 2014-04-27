<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 23
 * Rule 23 : perCAP -> per-CAP where C != 'r' AND P != 'er'
 */
class DisambiguatorPrefixRule23 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 23
     * Rule 23 : perCAP -> per-CAP where C != 'r' AND P != 'er'
     */
    public function disambiguate($word)
    {
        $contains = preg_match('/^per([bcdfghjklmnpqrstvwxyz])([a-z])(.*)$/', $word, $matches);

        if ($contains === 1) {
            if (preg_match('/^er(.*)$/', $matches[3]) === 1) {
                return;
            }

            return $matches[1] . $matches[2] . $matches[3];
        }
    }
}
