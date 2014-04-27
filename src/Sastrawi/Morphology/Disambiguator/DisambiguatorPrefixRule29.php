<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 29
 * Original Rule 29 : peng{g|h|q} -> peng-{g|h|q}
 * Modified Rule 29 by ECS : pengC -> peng-C
 */
class DisambiguatorPrefixRule29 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 29
     * Original Rule 29 : peng{g|h|q} -> peng-{g|h|q}
     * Modified Rule 29 by ECS : pengC -> peng-C
     */
    public function disambiguate($word)
    {
        if (preg_match('/^peng([bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }
}
