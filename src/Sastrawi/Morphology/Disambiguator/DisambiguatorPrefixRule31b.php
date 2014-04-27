<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 31b
 * Original Rule 31 : penyV -> peny-sV
 * Modified by CC, shifted to 31b
 */
class DisambiguatorPrefixRule31b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 31b
     * Original Rule 31 : penyV -> peny-sV
     * Modified by CC, shifted to 31b
     */
    public function disambiguate($word)
    {
        if (preg_match('/^peny([aiueo])(.*)$/', $word, $matches)) {
            return 's' . $matches[1] . $matches[2];
        }
    }
}
