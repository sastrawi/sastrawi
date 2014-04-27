<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 11
 * Rule 11 : mem{b|f|v} -> mem-{b|f|v}
 */
class DisambiguatorPrefixRule11 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 11
     * Rule 11 : mem{b|f|v} -> mem-{b|f|v}
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^mem([bfv])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2];
        }
    }
}
