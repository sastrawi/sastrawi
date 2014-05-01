<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Context;

/**
 * Stemming Context Interface
 *
 * @since  0.1.0
 * @author Andy Librian <andylibrian@gmail.com>
 */
interface ContextInterface
{
    /**
     * @return string
     */
    public function getOriginalWord();

    /**
     * @return void
     */
    public function setCurrentWord($word);

    /**
     * @return string
     */
    public function getCurrentWord();

    /**
     * @return \Sastrawi\Dictionary\DictionaryInterface
     */
    public function getDictionary();

    /**
     * @return void
     */
    public function stopProcess();

    /**
     * @return boolean
     */
    public function processIsStopped();

    /**
     * @return void
     */
    public function addRemoval(RemovalInterface $removal);

    /**
     * @return RemovalInterface[]
     */
    public function getRemovals();
}
