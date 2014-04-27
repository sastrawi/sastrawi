<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 30c
 * Rule 30c : pengV -> pengV- where V = 'e'
 */
class DisambiguatorPrefixRule30c implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 30c
     * Rule 30a : peng-V -> pengV- where V = 'e'
     */
    public function disambiguate($word)
    {
        if (preg_match('/^penge(.*)$/', $word, $matches)) {
            return $matches[1];
        }
    }
}
