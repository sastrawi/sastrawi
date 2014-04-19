<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Dictionary;

/**
 * The Dictionary interface used by the stemmer.
 *
 * @since  0.1.0
 * @author Andy Librian <andylibrian@gmail.com>
 */
interface DictionaryInterface extends \Countable
{
    /**
     * Search for a word in the dictionary.
     *
     * @param string $word The word to search for.
     *
     * @return string|null String If the dictionary contains the word, null otherwise.
     */
    public function searchFor($word);
}
