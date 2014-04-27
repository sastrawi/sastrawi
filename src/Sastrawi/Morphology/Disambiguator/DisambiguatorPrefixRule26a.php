<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 26a
 * Rule 26a : pem{rV|V} -> pe-m{rV|V}
 */
class DisambiguatorPrefixRule26a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 26a
     * Rule 26a : pem{rV|V} -> pe-m{rV|V}
     */
    public function disambiguate($word)
    {
        if (preg_match('/^pem([aiueo])(.*)$/', $word, $matches)) {
            return 'm' . $matches[1] . $matches[2];
        }
    }
}
