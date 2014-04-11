<?php

namespace Sastrawi\Stemmer\Visitor;

use Sastrawi\Stemmer\VisitorInterface;
use Sastrawi\Stemmer\ContextInterface;
use Sastrawi\Stemmer\Removal;

class DisambiguatePrefixRule34 implements VisitorInterface
{
    public function visit(ContextInterface $context)
    { 
        $result = $this->disambiguatePrefixRule34($context->getCurrentWord());
        $lookup = $context->getDictionary()->lookup($result);
 
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

    /**
     * Disambiguate Prefix Rule 34
     * Rule 34 : peCP -> pe-CP where C != {r|w|y|l|m|n} and P != 'er'
     */
    public function disambiguatePrefixRule34($word)
    {
        if (preg_match('/^pe([bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches)) {
            if (preg_match('/^er(.*)$/', $matches[2]) === 1) {
                return;
            }
            
            return $matches[1] . $matches[2];
        }
    }
}
