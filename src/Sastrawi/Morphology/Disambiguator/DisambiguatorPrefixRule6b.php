<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 6b
 * Rule 6b : terV -> te-rV
 */
class DisambiguatorPrefixRule6b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 6b
     * Rule 6b : terV -> te-rV
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^ter([aiueo].*)$/', $word, $matches);

        if ($contains === 1) {
            return 'r' . $matches[1];
        }
    }
}
