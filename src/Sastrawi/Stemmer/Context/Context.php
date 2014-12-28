<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Context;

use Sastrawi\Dictionary\DictionaryInterface;
use Sastrawi\Stemmer\Context\Visitor\VisitorInterface;
use Sastrawi\Stemmer\Context\Visitor\VisitableInterface;
use Sastrawi\Stemmer\ConfixStripping;

/**
 * Stemming Context using Nazief and Adriani, CS, ECS, Improved ECS
 */
class Context implements ContextInterface, VisitableInterface
{
    /**
     * @var string
     */
    protected $originalWord;

    /**
     * @var string
     */
    protected $currentWord;

    /**
     * @var boolean
     */
    protected $processIsStopped = false;

    /**
     * @var \Sastrawi\Stemmer\Context\RemovalInterface[]
     */
    protected $removals = array();

    /**
     * @var \Sastrawi\Dictionary\DictionaryInterface
     */
    protected $dictionary;

    /**
     * @var \Sastrawi\Stemmer\Context\Visitor\VisitorProvider
     */
    protected $visitorProvider;

    /**
     * @var \Sastrawi\Stemmer\Context\Visitor\VisitorInterface[]
     */
    protected $visitors = array();

    /**
     * @var \Sastrawi\Stemmer\Context\Visitor\VisitorInterface[]
     */
    protected $suffixVisitors = array();

    /**
     * @var \Sastrawi\Stemmer\Context\Visitor\VisitorInterface[]
     */
    protected $prefixVisitors = array();

    /**
     * @var string
     */
    protected $result;

    /**
     * @param string                                            $originalWord
     * @param \Sastrawi\Dictionary\DictionaryInterface          $dictionary
     * @param \Sastrawi\Stemmer\Context\Visitor\VisitorProvider $visitorProvider
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

    /**
     * Execute stemming process; the result can be retrieved with getResult()
     *
     * @return void
     */
    public function execute()
    {
        // step 1 - 5
        $this->startStemmingProcess();

        // step 6
        if ($this->dictionary->contains($this->getCurrentWord())) {
            $this->result = $this->getCurrentWord();
        } else {
            $this->result = $this->originalWord;
        }
    }

    /**
     * @return void
     */
    protected function startStemmingProcess()
    {
        // step 1
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        $this->acceptVisitors($this->visitors);

        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        $csPrecedenceAdjustmentSpecification = new ConfixStripping\PrecedenceAdjustmentSpecification();

        /*
         * Confix Stripping
         * Try to remove prefix before suffix if the specification is met
         */
        if ($csPrecedenceAdjustmentSpecification->isSatisfiedBy($this->getOriginalWord())) {
            // step 4, 5
            $this->removePrefixes();
            if ($this->dictionary->contains($this->getCurrentWord())) {
                return;
            }

            // step 2, 3
            $this->removeSuffixes();
            if ($this->dictionary->contains($this->getCurrentWord())) {
                return;
            } else {
                // if the trial is failed, restore the original word
                // and continue to normal rule precedence (suffix first, prefix afterwards)
                $this->setCurrentWord($this->originalWord);
                $this->removals = array();
            }
        }

        // step 2, 3
        $this->removeSuffixes();
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        // step 4, 5
        $this->removePrefixes();
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        // ECS loop pengembalian akhiran
        $this->loopPengembalianAkhiran();
    }

    protected function removePrefixes()
    {
        for ($i = 0; $i < 3; $i++) {
            $this->acceptPrefixVisitors($this->prefixVisitors);
            if ($this->dictionary->contains($this->getCurrentWord())) {
                return;
            }
        }
    }

    protected function removeSuffixes()
    {
        $this->acceptVisitors($this->suffixVisitors);
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

    protected function acceptPrefixVisitors(array $visitors)
    {
        $removalCount = count($this->removals);
        foreach ($visitors as $visitor) {
            $this->accept($visitor);

            if ($this->getDictionary()->contains($this->getCurrentWord())) {
                return $this->getCurrentWord();
            }

            if ($this->processIsStopped()) {
                return $this->getCurrentWord();
            }

            if (count($this->removals) > $removalCount) {
                return;
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

                // step 4, 5
                $this->removePrefixes();
                if ($this->dictionary->contains($this->getCurrentWord())) {
                    return;
                }

                $this->setCurrentWord($removal->getResult() . 'kan');
            } else {
                $this->setCurrentWord($removal->getSubject());
            }

            // step 4, 5
            $this->removePrefixes();
            if ($this->dictionary->contains($this->getCurrentWord())) {
                return;
            }

            $this->removals = $removals;
            $this->setCurrentWord($currentWord);
        }
    }

    /**
     * Check wether the removed part is a suffix
     *
     * @param  \Sastrawi\Stemmer\Context\RemovalInterface $removal
     * @return boolean
     */
    protected function isSuffixRemoval(RemovalInterface $removal)
    {
        return $removal->getAffixType() == 'DS'
            || $removal->getAffixType() == 'PP'
            || $removal->getAffixType() == 'P';
    }

    /**
     * Restore prefix to proceed with ECS loop pengembalian akhiran
     *
     * @return void
     */
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
