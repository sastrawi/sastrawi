<?php

namespace Sastrawi\Stemmer\Visitor;

use Sastrawi\Stemmer\VisitorInterface;
use Sastrawi\Stemmer\ContextInterface;
use Sastrawi\Stemmer\Removal;

class DisambiguatePrefixRule8 implements VisitorInterface
{
    public function visit(ContextInterface $context)
    { 
        $result = $this->disambiguatePrefixRule8($context->getCurrentWord());
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
     * Disambiguate Prefix Rule 8
     * Rule 8 : terCP -> ter-CP where C != 'r' and P != 'er'
     */
    public function disambiguatePrefixRule8($word)
    {
        $matches  = null;
        $contains = preg_match('/^ter([bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            if ($matches[1] === 'r' || preg_match('/^er(.*)$/', $matches[2]) === 1) {
                return;
            }
            
            return $matches[1] . $matches[2];
        }
    }
}
