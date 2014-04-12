<?php

namespace Sastrawi\Stemmer;

use Sastrawi\Dictionary\DictionaryInterface;
use Sastrawi\Stemmer\Visitor\PrefixDisambiguator;
use Sastrawi\Morphology\Disambiguator;

class Stemmer
{
    protected $dictionary;

    protected $visitors = array();
    
    protected $suffixVisitors = array();
    
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
        
        $this->suffixVisitors[] = new Visitor\RemoveInflectionalParticle(); // {lah|kah|tah|pun}
        $this->suffixVisitors[] = new Visitor\RemoveInflectionalPossessivePronoun(); // {ku|mu|nya}
        $this->suffixVisitors[] = new Visitor\RemoveDerivationalSuffix(); // {i|kan|an}

        $this->prefixVisitors[] = new Visitor\RemovePlainPrefix(); // {di|ke|se}
        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule1a(),
                new Disambiguator\DisambiguatorPrefixRule1b(),
            )
        );
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule2()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule3()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule4()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule5()));
        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule6a(),
                new Disambiguator\DisambiguatorPrefixRule6b(),
            )
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule7()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule8()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule9()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule10()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule11()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule12()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule13()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule14()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule15()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule16()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule17()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule19()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule20()));
        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule21a(),
                new Disambiguator\DisambiguatorPrefixRule21b(),
            )
        );
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule23()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule24()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule25()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule26()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule27()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule28()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule29()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule30()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule32()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule34()));
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

        if ($this->dictionary->lookup($context->getCurrentWord()) !== null) {
            return $context->getCurrentWord();
        }
         
        foreach (array($this->visitors, $this->suffixVisitors) as $visitors) {
            $this->acceptVisitors($context, $visitors);

            if ($this->dictionary->lookup($context->getCurrentWord()) !== null) {
                return $context->getCurrentWord();
            }
        }
                 
        for ($i = 0; $i < 3; $i++) {

            $this->acceptVisitors($context, $this->prefixVisitors);
            
            if ($this->dictionary->lookup($context->getCurrentWord()) !== null) {
                return $context->getCurrentWord();
            }           
        }
 
        return $context->getCurrentWord();
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
