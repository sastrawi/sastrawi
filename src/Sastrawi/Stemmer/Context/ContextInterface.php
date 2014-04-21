<?php

namespace Sastrawi\Stemmer\Context;

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
