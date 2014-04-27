<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 28b
 * Rule 28b : pen{V} -> pe-t{V}
 */
class DisambiguatorPrefixRule28b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 28b
     * Rule 28b : pen{V} -> pe-t{V}
     */
    public function disambiguate($word)
    {
        if (preg_match('/^pen([aiueo])(.*)$/', $word, $matches)) {
            return 't' . $matches[1] . $matches[2];
        }
    }
}
