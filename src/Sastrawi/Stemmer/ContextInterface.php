<?php

namespace Sastrawi\Stemmer;

interface ContextInterface
{
    public function getOriginalWord();

    public function setCurrentWord($word);

    public function getCurrentWord();

    public function stopProcess();

    public function processIsStopped();

    public function addRemoval(RemovalInterface $removal);

    public function getRemovals();
}
