<?php

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 12
 * Rule 12 : mempe{r|l} -> mem-pe{r|l}
 */
class DisambiguatorPrefixRule12 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 12
     * Rule 12 : mempe{r|l} -> mem-pe{r|l}
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^mempe([rl])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return 'pe' . $matches[1] . $matches[2];
        }
    }
}
