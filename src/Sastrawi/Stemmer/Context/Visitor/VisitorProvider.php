<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Context\Visitor;

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
        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule13a(),
                new Disambiguator\DisambiguatorPrefixRule13b(),
            )
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule14()));
        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule15a(),
                new Disambiguator\DisambiguatorPrefixRule15b(),
            )
        );
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule16()));

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule17a(),
                new Disambiguator\DisambiguatorPrefixRule17b(),
                new Disambiguator\DisambiguatorPrefixRule17c(),
                new Disambiguator\DisambiguatorPrefixRule17d(),
            )
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule18a(),
                new Disambiguator\DisambiguatorPrefixRule18b(),
            )
        );
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

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule26a(),
                new Disambiguator\DisambiguatorPrefixRule26b(),
            )
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule27()));

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule28a(),
                new Disambiguator\DisambiguatorPrefixRule28b(),
            )
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule29()));

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule30a(),
                new Disambiguator\DisambiguatorPrefixRule30b(),
                new Disambiguator\DisambiguatorPrefixRule30c(),
            )
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule31a(),
                new Disambiguator\DisambiguatorPrefixRule31b(),
            )
        );
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule32()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule34()));

        // CS additional rules
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule35()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule36()));

        // CC infix rules
        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule37a(),
                new Disambiguator\DisambiguatorPrefixRule37b(),
            )
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule38a(),
                new Disambiguator\DisambiguatorPrefixRule38b(),
            )
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule39a(),
                new Disambiguator\DisambiguatorPrefixRule39b(),
            )
        );

        $this->prefixVisitors[] = new PrefixDisambiguator(
            array(
                new Disambiguator\DisambiguatorPrefixRule40a(),
                new Disambiguator\DisambiguatorPrefixRule40b(),
            )
        );

        // Sastrawi rules
        // ku-A, kau-A
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule41()));
        $this->prefixVisitors[] = new PrefixDisambiguator(array(new Disambiguator\DisambiguatorPrefixRule42()));
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
