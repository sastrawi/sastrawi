<?php

namespace Sastrawi\Stemmer;

use Sastrawi\Dictionary\DictionaryInterface;

class Stemmer
{
    protected $dictionary;

    protected $visitors = array();
    
    protected $prefixVisitors = array();
    
    public function __construct(DictionaryInterface $dictionary)
    {
        $this->dictionary = $dictionary;
        $this->initVisitors();
    }

    public function getDictionary()
    {
        return $this->dictionary;
    }

    protected function initVisitors()
    {
        $this->visitors[] = new Visitor\DontStemShortWord();
        $this->visitors[] = new Visitor\RemoveInflectionalParticle(); // {lah|kah|tah|pun}
        $this->visitors[] = new Visitor\RemoveInflectionalPossessivePronoun(); // {ku|mu|nya}
        $this->visitors[] = new Visitor\RemoveDerivationalSuffix(); // {i|kan|an}

        $this->prefixVisitors[] = new Visitor\RemovePlainPrefix(); // {di|ke|se}
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule1(); // berV -> ber-V | berV -> be-rV
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule2();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule3();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule4();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule5();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule6();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule7();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule8();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule9();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule10();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule11();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule12();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule13();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule14();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule15();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule16();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule17();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule19();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule20();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule21();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule23();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule24();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule25();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule26();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule27();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule28();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule29();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule30();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule32();
        $this->prefixVisitors[] = new Visitor\DisambiguatePrefixRule34();
    }
    
    /**
     * Stem a sentence to common stem form of its words
     *
     * @param string $sentence the sentence to stem, e.g : memberdayakan pembangunan
     * @return string common stem form, e.g : daya bangun
     */
    public function stem($sentence)
    {
        $words = explode(' ', $sentence);
        $stemmedWords = array();

        foreach ($words as $word) {
            $stemmedWords[] = $this->stemWord(strtolower($word));
        }

        return implode(' ', $stemmedWords);
    }

    /**
     * Stem a word to its common stem form
     *
     * @param string $word the word to stem, e.g : mengalahkan
     * @return string common stem form, e.g : kalah
     */
    public function stemWord($word)
    {
        $context = new Context($word, $this->dictionary);

        $lookupResult = $this->dictionary->lookup($word);
        if ($lookupResult !== null) {
            return $lookupResult;
        }
        
        foreach ($this->visitors as $visitor) {
                        
            $context->accept($visitor);
 
            $lookupResult = $this->dictionary->lookup($context->getCurrentWord());
            if ($lookupResult !== null) {
                return $lookupResult;
            }

            if ($context->processIsStopped()) {
                return $context->getCurrentWord();
            }

        }
 
        for ($i = 0; $i < 3; $i++) {

            foreach ($this->prefixVisitors as $visitor) {
                            
                $context->accept($visitor);
 
                $lookupResult = $this->dictionary->lookup($context->getCurrentWord());
 
                if ($lookupResult !== null) {
                    return $lookupResult;
                }

                if ($context->processIsStopped()) {
                    return $context->getCurrentWord();
                }
            }
        }

        return $context->getCurrentWord();
    }

    /**
     * Does the word contain invalid affix pair?
     * ber-i|di-an|ke-i|ke-an|me-an|ter-an|per-an
     * @param string $word
     */
    public function containsInvalidAffixPair($word)
    {
        if (preg_match('/^me(.*)kan$/', $word) === 1) {
            return false;
        }

        if ($word == 'ketahui') {
            return false;
        }

        $contains = false
                    || preg_match('/^ber(.*)i$/', $word) === 1
                    || preg_match('/^di(.*)an$/', $word) === 1
                    || preg_match('/^ke(.*)i$/', $word) === 1
                    || preg_match('/^ke(.*)an$/', $word) === 1
                    || preg_match('/^me(.*)an$/', $word) === 1
                    || preg_match('/^ter(.*)an$/', $word) === 1
                    || preg_match('/^per(.*)an$/', $word) === 1;

        return $contains;
    }
}
