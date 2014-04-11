<?php

namespace Sastrawi\Stemmer\Visitor;

use Sastrawi\Stemmer\VisitorInterface;
use Sastrawi\Stemmer\ContextInterface;
use Sastrawi\Stemmer\Removal;

class DisambiguatePrefixRule20 implements VisitorInterface
{
    public function visit(ContextInterface $context)
    { 
        $result = $this->disambiguatePrefixRule20($context->getCurrentWord());
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
     * Disambiguate Prefix Rule 20
     * Rule 20 : pe{w|y}V -> pe-{w|y}V
     */
    public function disambiguatePrefixRule20($word)
    {
        $contains = preg_match('/^pe([wy])([aiueo])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return $matches[1] . $matches[2] . $matches[3];
        }
    }
}
