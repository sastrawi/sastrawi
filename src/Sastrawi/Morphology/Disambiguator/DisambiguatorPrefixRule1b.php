<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
* Disambiguate Prefix Rule 1b
* Rule 1a : berV -> be-rV
*/
class DisambiguatorPrefixRule1b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 1b
     * Rule 1b : berV -> be-rV
     * @return string
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^ber([aiueo].*)$/', $word, $matches);

        if ($contains === 1) {
            return 'r' . $matches[1];
        }
    }
}
