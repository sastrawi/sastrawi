<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 27
 * Rule 27 : pen{c|d|j|z} -> pen-{c|d|j|z}
 */
class DisambiguatorPrefixRule27 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 27
     * Rule 27 : pen{c|d|j|z} -> pen-{c|d|j|z}
     */
    public function disambiguate($word)
    {
        if (preg_match('/^pen([cdjz])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }
}
