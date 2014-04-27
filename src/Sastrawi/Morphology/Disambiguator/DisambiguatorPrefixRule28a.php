<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 28a
 * Rule 28a : pen{V} -> pe-n{V}
 */
class DisambiguatorPrefixRule28a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 28a
     * Rule 28a : pen{V} -> pe-n{V}
     */
    public function disambiguate($word)
    {
        if (preg_match('/^pen([aiueo])(.*)$/', $word, $matches)) {
            return 'n' . $matches[1] . $matches[2];
        }
    }
}
