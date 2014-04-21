<?php

namespace Sastrawi\Stemmer\Context;

use Sastrawi\Dictionary\DictionaryInterface;
use Sastrawi\Stemmer\Context\Visitor\VisitorInterface;
use Sastrawi\Stemmer\Context\Visitor\VisitableInterface;
use Sastrawi\Stemmer\ConfixStripping;

class Context implements ContextInterface, VisitableInterface
{
    protected $originalWord;

    protected $currentWord;

    protected $processIsStopped = false;

    protected $removals = array();

    protected $dictionary;

    protected $visitors = array();

    protected $suffixVisitors = array();

    protected $prefixVisitors = array();

    protected $result;

    /**
     * @param string                                   $originalWord
     * @param \Sastrawi\Dictionary\DictionaryInterface $dictionary
     */
    public function __construct($originalWord, DictionaryInterface $dictionary)
    {
        $this->originalWord = $originalWord;
        $this->currentWord  = $this->originalWord;
        $this->dictionary   = $dictionary;

        $this->initVisitors();
    }

    protected function initVisitors()
    {
        $visitorProvider = new Visitor\VisitorProvider();

        $this->visitors       = $visitorProvider->getVisitors();
        $this->suffixVisitors = $visitorProvider->getSuffixVisitors();
        $this->prefixVisitors = $visitorProvider->getPrefixVisitors();
    }

    public function setDictionary(DictionaryInterface $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    public function getDictionary()
    {
        return $this->dictionary;
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

    public function getResult()
    {
        return $this->result;
    }

    public function execute()
    {
        $result = $this->doExecute();

        if ($this->dictionary->contains($result)) {
            $this->result = $result;
        } else {
            $this->result = $this->originalWord;
        }
    }

    protected function doExecute()
    {
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return $this->getCurrentWord();
        }

        $this->acceptVisitors($this->visitors);

        if ($this->dictionary->contains($this->getCurrentWord())) {
            return $this->getCurrentWord();
        }

        $csPrecedenceAdjustmentSpecification = new ConfixStripping\PrecedenceAdjustmentSpecification();

        /*
         * Confix Stripping
         * Try to remove prefix before suffix if the specification is met
         */
        if ($csPrecedenceAdjustmentSpecification->isSatisfiedBy($this->getOriginalWord())) {
            for ($i = 0; $i < 3; $i++) {
                $this->acceptVisitors($this->prefixVisitors);
                if ($this->dictionary->contains($this->getCurrentWord())) {
                    return $this->getCurrentWord();
                }
            }

            $this->acceptVisitors($this->suffixVisitors);
            if ($this->dictionary->contains($this->getCurrentWord())) {
                return $this->getCurrentWord();
            } else {
                // if the trial is failed, restore the original word
                // and continue to normal rule precedence (suffix first, prefix afterwards)
                $this->setCurrentWord($this->originalWord);
            }
        }

        $this->acceptVisitors($this->suffixVisitors);
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return $this->getCurrentWord();
        }

        for ($i = 0; $i < 3; $i++) {
            $this->acceptVisitors($this->prefixVisitors);
            if ($this->dictionary->contains($this->getCurrentWord())) {
                return $this->getCurrentWord();
            }
        }

        return $this->getCurrentWord();
    }

    public function accept(VisitorInterface $visitor)
    {
        $visitor->visit($this);
    }

    protected function acceptVisitors(array $visitors)
    {
        foreach ($visitors as $visitor) {

            $this->accept($visitor);

            if ($this->getDictionary()->contains($this->getCurrentWord())) {
                return $this->getCurrentWord();
            }

            if ($this->processIsStopped()) {
                return $this->getCurrentWord();
            }
        }
    }
}
