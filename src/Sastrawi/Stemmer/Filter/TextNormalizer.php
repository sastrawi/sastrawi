<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Filter;

class TextNormalizer
{
    /**
     * @param string $text
     */
    public static function normalizeText($text)
    {
        $text = strtolower(trim(str_replace('.', ' ', $text)));

        return preg_replace('/[^a-z0-9 -]/im', '', $text);
    }
}
