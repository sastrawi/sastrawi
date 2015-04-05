<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 42
 * Rule 42 : kauA -> kau-A
 */
class DisambiguatorPrefixRule42 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 42
     * Rule 42 : kauA -> kau-A
     */
    public function disambiguate($word)
    {
        if (preg_match('/^kau(.*)$/', $word, $matches)) {
            return $matches[1];
        }
    }
}
