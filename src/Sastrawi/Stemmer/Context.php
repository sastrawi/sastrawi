<?php

namespace Sastrawi\Stemmer;

class Context implements ContextInterface, VisitableInterface
{
    protected $originalWord;
    
    protected $currentWord;

    protected $processIsStopped = false;

    protected $removals = array();

    public function __construct($originalWord)
    {
        $this->originalWord = $originalWord;
        $this->currentWord  = $this->originalWord;
    }
    
    public function getOriginalWord()
    {
        return $this->originalWord;
    }

    public function setCurrentWord($word)
    {
        $this->currentWord = $word;
    }

    public function getCurrentWord()
    {
        return $this->currentWord;
    }

    public function stopProcess()
    {
        $this->processIsStopped = true;
    }

    public function processIsStopped()
    {
        return $this->processIsStopped;
    }

    public function addRemoval(RemovalInterface $removal)
    {
        $this->removals[] = $removal;
    }

    public function getRemovals()
    {
        return $this->removals;
    }

    public function accept(VisitorInterface $visitor)
    {
        $visitor->visit($this);
    }
}
