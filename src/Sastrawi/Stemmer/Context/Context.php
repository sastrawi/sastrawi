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

    protected $visitorProvider;

    protected $visitors = array();

    protected $suffixVisitors = array();

    protected $prefixVisitors = array();

    protected $result;

    /**
     * @param string                                   $originalWord
     * @param \Sastrawi\Dictionary\DictionaryInterface $dictionary
     */
    public function __construct(
        $originalWord,
        DictionaryInterface $dictionary,
        Visitor\VisitorProvider $visitorProvider
    ) {
        $this->originalWord = $originalWord;
        $this->currentWord  = $this->originalWord;
        $this->dictionary   = $dictionary;
        $this->visitorProvider = $visitorProvider;

        $this->initVisitors();
    }

    protected function initVisitors()
    {
        $this->visitors       = $this->visitorProvider->getVisitors();
        $this->suffixVisitors = $this->visitorProvider->getSuffixVisitors();
        $this->prefixVisitors = $this->visitorProvider->getPrefixVisitors();
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

    /**
     * @return string result of the stemming execution
     */
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

        // ECS loop pengembalian akhiran
        $loopResult = $this->loopPengembalianAkhiran();

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

    /**
     * ECS Loop Pengembalian Akhiran
     */
    public function loopPengembalianAkhiran()
    {
        // restore prefix to form [DP+[DP+[DP]]] + Root word
        $this->restorePrefix();

        $removals = $this->removals;
        $reversedRemovals = array_reverse($removals);
        $currentWord = $this->getCurrentWord();

        foreach ($reversedRemovals as $removal) {
            if (!$this->isSuffixRemoval($removal)) {
                continue;
            }

            if ($removal->getRemovedPart() == 'kan') {
                $this->setCurrentWord($removal->getResult() . 'k');

                for ($i = 0; $i < 3; $i++) {
                    $this->acceptVisitors($this->prefixVisitors);
                    if ($this->dictionary->contains($this->getCurrentWord())) {
                        return $this->getCurrentWord();
                    }
                }

                $this->setCurrentWord($removal->getResult() . 'kan');
            } else {
                $this->setCurrentWord($removal->getSubject());
            }

            for ($i = 0; $i < 3; $i++) {
                $this->acceptVisitors($this->prefixVisitors);
                if ($this->dictionary->contains($this->getCurrentWord())) {
                    return $this->getCurrentWord();
                }
            }

            $this->removals = $removals;
            $this->setCurrentWord($currentWord);
        }
    }

    protected function isSuffixRemoval($removal)
    {
        return $removal->getAffixType() == 'DS'
            || $removal->getAffixType() == 'PP'
            || $removal->getAffixType() == 'P';
    }

    public function restorePrefix()
    {
        foreach ($this->removals as $i => $removal) {
            if ($removal->getAffixType() == 'DP') {
                // return the word before precoding (the subject of first prefix removal)
                $this->setCurrentWord($removal->getSubject());
                break;
            }
        }

        foreach ($this->removals as $i => $removal) {
            if ($removal->getAffixType() == 'DP') {
                unset($this->removals[$i]);
            }
        }
    }
}
