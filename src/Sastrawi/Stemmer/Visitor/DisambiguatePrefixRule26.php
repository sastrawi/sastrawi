<?php

namespace Sastrawi\Stemmer\Visitor;

use Sastrawi\Stemmer\VisitorInterface;
use Sastrawi\Stemmer\ContextInterface;
use Sastrawi\Stemmer\Removal;

class DisambiguatePrefixRule26 implements VisitorInterface
{
    public function visit(ContextInterface $context)
    { 
        $result = $this->disambiguatePrefixRule26($context->getCurrentWord());
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
     * Disambiguate Prefix Rule 26
     * Rule 26 : pem{rV|V} -> pe-m{rV|V}
     */
    public function disambiguatePrefixRule26($word)
    {
        if (preg_match('/^pem([aiueo])(.*)$/', $word, $matches)) {
            return 'm' . $matches[1] . $matches[2];
        }
    }
}
