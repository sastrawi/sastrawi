<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 21a
 * Rule 21a : perV -> per-V
 */
class DisambiguatorPrefixRule21a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 21a
     * Rule 21a : perV -> per-V
     */
    public function disambiguate($word)
    {
        if (preg_match('/^per([aiueo])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }
}
