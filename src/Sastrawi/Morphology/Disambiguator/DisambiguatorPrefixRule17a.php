<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 17a
 * Rule 17a : mengV -> meng-V
 */
class DisambiguatorPrefixRule17a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 17a
     * Rule 17a : mengV -> meng-V
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^meng([aiueo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2];
        }
    }
}
