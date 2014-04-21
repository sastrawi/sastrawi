<?php

namespace Sastrawi\Morphology\Disambiguator;

interface DisambiguatorInterface
{
    /**
     * @return string|null
     */
    public function disambiguate($word);
}
