<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 21b
 * Rule 21a : perV -> pe-rV
 */
class DisambiguatorPrefixRule21b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 21b
     * Rule 21a : perV -> pe-rV
     */
    public function disambiguate($word)
    {
        if (preg_match('/^pe(r[aiueo])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }
}
