<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule no 14
 *
 * Rule 14 modified by Andy Librian : men{c|d|j|s|t|z} -> men-{c|d|j|s|t|z}
 * in order to stem mentaati
 *
 * Rule 14 modified by ECS: men{c|d|j|s|z} -> men-{c|d|j|s|z}
 * in order to stem mensyaratkan, mensyukuri
 *
 * Original CS Rule no 14 was : men{c|d|j|z} -> men-{c|d|j|z}
 */
class DisambiguatorPrefixRule14 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule no 14
     *
     * Rule 14 modified by Andy Librian : men{c|d|j|s|t|z} -> men-{c|d|j|s|t|z}
     * in order to stem mentaati
     *
     * Rule 14 modified by ECS: men{c|d|j|s|z} -> men-{c|d|j|s|z}
     * in order to stem mensyaratkan, mensyukuri
     *
     * Original CS Rule no 14 was : men{c|d|j|z} -> men-{c|d|j|z}
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^men([cdjstz])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2];
        }
    }
}
