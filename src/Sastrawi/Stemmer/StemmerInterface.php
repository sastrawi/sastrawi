<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer;

/**
 * The stemmer interface
 *
 * @since  0.4.0
 * @author Andy Librian <andylibrian@gmail.com>
 */
interface StemmerInterface
{
    /**
     * Stem a text to its common stem form
     *
     * @param  string $text the text string to stem, e.g : memberdayakan pembangunan
     * @return string common stem form, e.g : daya bangun
     */
    public function stem($text);
}
