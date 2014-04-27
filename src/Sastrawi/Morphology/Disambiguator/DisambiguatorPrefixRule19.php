<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 19
 * Original Rule 19 : mempV -> mem-pV where V != 'e'
 * Modified Rule 19 by ECS : mempA -> mem-pA where A != 'e' in order to stem memproteksi
 */
class DisambiguatorPrefixRule19 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 19
     * Original Rule 19 : mempV -> mem-pV where V != 'e'
     * Modified Rule 19 by ECS : mempA -> mem-pA where A != 'e' in order to stem memproteksi
     */
    public function disambiguate($word)
    {
        if (preg_match('/^memp([abcdfghijklmopqrstuvwxyz])(.*)$/', $word, $matches)) {
            return 'p' . $matches[1] . $matches[2];
        }
    }
}
