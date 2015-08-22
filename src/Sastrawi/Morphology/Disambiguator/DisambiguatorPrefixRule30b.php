<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 30b
 * Rule 30b : pengV -> peng-kV
 */
class DisambiguatorPrefixRule30b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 30b
     * Rule 30b : pengV -> peng-kV
     */
    public function disambiguate($word)
    {
        if (preg_match('/^peng([aiueo])(.*)$/', $word, $matches)) {
            return 'k' . $matches[1] . $matches[2];
        }
    }
}
