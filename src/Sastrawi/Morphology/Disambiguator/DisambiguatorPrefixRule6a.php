<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 6a
 * Rule 6a : terV -> ter-V
 * @return string
 */
class DisambiguatorPrefixRule6a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 6a
     * Rule 6a : terV -> ter-V
     * @return string
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^ter([aiueo].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }
}
