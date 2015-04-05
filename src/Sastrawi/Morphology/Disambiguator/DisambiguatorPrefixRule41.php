<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 41
 * Rule 41 : kuA -> ku-A
 */
class DisambiguatorPrefixRule41 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 41
     * Rule 41 : kuA -> ku-A
     */
    public function disambiguate($word)
    {
        if (preg_match('/^ku(.*)$/', $word, $matches)) {
            return $matches[1];
        }
    }
}
