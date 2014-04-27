<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 17c
 * Rule 17c : mengV -> mengV- where V = 'e'
 */
class DisambiguatorPrefixRule17c implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 17c
     * Rule 17c : mengV -> mengV- where V = 'e'
     */
    public function disambiguate($word)
    {
        if (preg_match('/^menge(.*)$/', $word, $matches)) {
            return $matches[1];
        }
    }
}
