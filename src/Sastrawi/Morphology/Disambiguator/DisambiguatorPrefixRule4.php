<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
* Disambiguate Prefix Rule 4
* Rule 4 : belajar -> bel-ajar
*/
class DisambiguatorPrefixRule4 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 4
     * Rule 4 : belajar -> bel-ajar
     */
    public function disambiguate($word)
    {
        if ($word == 'belajar') {
            return 'ajar';
        }
    }
}
