<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 32
 * Rule 32 : pelV -> pe-lV except pelajar -> ajar
 */
class DisambiguatorPrefixRule32 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 32
     * Rule 32 : pelV -> pe-lV except pelajar -> ajar
     */
    public function disambiguate($word)
    {
        if ($word == 'pelajar') {
            return 'ajar';
        }

        if (preg_match('/^pe(l[aiueo])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }
}
