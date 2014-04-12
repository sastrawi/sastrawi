<?php

namespace Sastrawi\Stemmer\Visitor;

use Sastrawi\Stemmer\VisitorInterface;
use Sastrawi\Stemmer\ContextInterface;
use Sastrawi\Stemmer\Removal;
use Sastrawi\Morphology\Disambiguator\DisambiguatorInterface;

abstract class AbstractDisambiguatePrefixRule implements VisitorInterface
{
    protected $disambiguators = array();
        
    abstract protected function initDisambiguators();
    
    public function visit(ContextInterface $context)
    { 
        if (empty($this->disambiguators)) {
            $this->initDisambiguators();
        }
        
        $lookup = null;
        
        foreach ($this->disambiguators as $disambiguator) {
            $result = $disambiguator->disambiguate($context->getCurrentWord());
            $lookup = $context->getDictionary()->lookup($result);

            if ($lookup !== null) {
                break;
            }
        }
         
        if ($result === null) {
            return; 
        }
        
        $removedPart = preg_replace("/$result/", '', $context->getCurrentWord(), 1);
        
        $removal = new Removal(
            $this,
            $context->getCurrentWord(),
            $result,
            $removedPart
        );

        $context->addRemoval($removal);
        $context->setCurrentWord($result);
    }

    public function addDisambiguators(array $disambiguators)
    {
        foreach ($disambiguators as $disambiguator) {
            $this->addDisambiguator($disambiguator);
        }
    }

    public function addDisambiguator(DisambiguatorInterface $disambiguator)
    {
        $this->disambiguators[] = $disambiguator;
    }
}
