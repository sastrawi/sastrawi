<?php

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
