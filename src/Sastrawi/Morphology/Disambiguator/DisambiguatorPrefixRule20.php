<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 20
 * Rule 20 : pe{w|y}V -> pe-{w|y}V
 */
class DisambiguatorPrefixRule20 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 20
     * Rule 20 : pe{w|y}V -> pe-{w|y}V
     */
    public function disambiguate($word)
    {
        $contains = preg_match('/^pe([wy])([aiueo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2] . $matches[3];
        }
    }
}
