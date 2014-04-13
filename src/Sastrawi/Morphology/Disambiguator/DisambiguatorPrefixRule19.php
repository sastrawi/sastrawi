<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 19
 * Rule 19 : mempV -> mem-pV where V != 'e'
 */
class DisambiguatorPrefixRule19 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 19
     * Rule 19 : mempV -> mem-pV where V != 'e'
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^memp([aiuo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return 'p' . $matches[1] . $matches[2];
        }
    }
}
