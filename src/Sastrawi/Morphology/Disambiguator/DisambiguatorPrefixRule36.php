<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 36 (CS additional rules)
 * Rule 36 : peC1erC2 -> pe-C1erC2 where C1 != {r|w|y|l|m|n}
 */
class DisambiguatorPrefixRule36 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 36 (CS additional rules)
     * Rule 36 : peC1erC2 -> pe-C1erC2 where C1 != {r|w|y|l|m|n}
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^pe([bcdfghjkpqstvxz])(er[bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2] . $matches[3];
        }
    }
}
