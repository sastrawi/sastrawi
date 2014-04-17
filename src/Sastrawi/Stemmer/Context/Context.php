<?php

namespace Sastrawi\Stemmer\Context;

use Sastrawi\Dictionary\DictionaryInterface;
use Sastrawi\Stemmer\Context\Visitor\VisitorInterface;
use Sastrawi\Stemmer\Context\Visitor\VisitableInterface;
use Sastrawi\Stemmer\CS;

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

        if ($this->dictionary->lookup($result)) {
            $this->result = $result;
        } else {
            $this->result = $this->originalWord;
        }
    }

    protected function doExecute()
    {
        $context = $this;
        $word = $this->originalWord;

        if ($this->dictionary->lookup($context->getCurrentWord()) !== null) {
            return $context->getCurrentWord();
        }

        $this->acceptVisitors($context, $this->visitors);

        if ($this->dictionary->lookup($context->getCurrentWord()) !== null) {
            return $context->getCurrentWord();
        }

        $csPrecedenceAdjustmentSpecification = new CS\PrecedenceAdjustmentSpecification();

        if (! $csPrecedenceAdjustmentSpecification->isSatisfiedBy($word)) {

            $this->acceptVisitors($context, $this->suffixVisitors);
            if ($this->dictionary->lookup($context->getCurrentWord()) !== null) {
                return $context->getCurrentWord();
            }

            for ($i = 0; $i < 3; $i++) {
                $this->acceptVisitors($context, $this->prefixVisitors);
                if ($this->dictionary->lookup($context->getCurrentWord()) !== null) {
                    return $context->getCurrentWord();
                }
            }

        } else {

            for ($i = 0; $i < 3; $i++) {
                $this->acceptVisitors($context, $this->prefixVisitors);
                if ($this->dictionary->lookup($context->getCurrentWord()) !== null) {
                    return $context->getCurrentWord();
                }
            }

            $this->acceptVisitors($context, $this->suffixVisitors);
            if ($this->dictionary->lookup($context->getCurrentWord()) !== null) {
                return $context->getCurrentWord();
            }

        }

        return $context->getCurrentWord();
    }

    public function accept(VisitorInterface $visitor)
    {
        $visitor->visit($this);
    }

    protected function acceptVisitors(ContextInterface $context, array $visitors)
    {
        foreach ($visitors as $visitor) {

            $context->accept($visitor);

            $lookupResult = $context->getDictionary()->lookup($context->getCurrentWord());
            if ($lookupResult !== null) {
                return $lookupResult;
            }

            if ($context->processIsStopped()) {
                return $context->getCurrentWord();
            }
        }
    }
}
