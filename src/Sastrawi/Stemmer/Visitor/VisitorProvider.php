<?php

namespace Sastrawi\Stemmer\Visitor;

use Sastrawi\Morphology\Disambiguator;

class VisitorProvider
{
    protected $visitors = array();

    protected $suffixVisitors = array();

    protected $prefixVisitors = array();

    public function __construct()
    {
        $this->initVisitors();
    }

    protected function initVisitors()
    {
        $this->visitors[] = new DontStemShortWord();

        $this->suffixVisitors[] = new RemoveInflectionalParticle(); // {lah|kah|tah|pun}
        $this->suffixVisitors[] = new RemoveInflectionalPossessivePronoun(); // {ku|mu|nya}
        $this->suffixVisitors[] = new RemoveDerivationalSuffix(); // {i|kan|an}

        $this->prefixVisitors[] = new RemovePlainPrefix(); // {di|ke|se}
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

    public function getVisitors()
    {
        return $this->visitors;
    }

    public function getSuffixVisitors()
    {
        return $this->suffixVisitors;
    }

    public function getPrefixVisitors()
    {
        return $this->prefixVisitors;
    }
}
