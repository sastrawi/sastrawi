<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 13b
 * Rule 13b : mem{rV|V} -> me-p{rV|V}
 */
class DisambiguatorPrefixRule13b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 13b
     * Rule 13b : mem{rV|V} -> me-p{rV|V}
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^mem([aiueo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return 'p' . $matches[1] . $matches[2];
        }
    }
}
