<?php

namespace Sastrawi\Stemmer\Visitor;

use Sastrawi\Stemmer\VisitorInterface;
use Sastrawi\Stemmer\ContextInterface;
use Sastrawi\Stemmer\Removal;

class DisambiguatePrefixRule13 implements VisitorInterface
{
    public function visit(ContextInterface $context)
    { 
        $result = $this->disambiguatePrefixRule13($context->getCurrentWord());
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
     * Disambiguate Prefix Rule 13
     * Rule 13 : mem{rV|V} -> me-m{rV|V}
     */
    public function disambiguatePrefixRule13($word)
    {
        $matches  = null;
        $contains = preg_match('/^mem([aiueo])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return 'm' . $matches[1] . $matches[2];
        }
    }
}
