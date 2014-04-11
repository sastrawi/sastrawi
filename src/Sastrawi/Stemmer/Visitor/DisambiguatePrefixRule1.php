<?php

namespace Sastrawi\Stemmer\Visitor;

use Sastrawi\Stemmer\VisitorInterface;
use Sastrawi\Stemmer\ContextInterface;
use Sastrawi\Stemmer\Removal;

class DisambiguatePrefixRule1 implements VisitorInterface
{
    public function visit(ContextInterface $context)
    { 
        $result = $this->disambiguatePrefixRule1a($context->getCurrentWord());
        $lookup = $context->getDictionary()->lookup($result);

        if ($lookup === null) {
            $result = $this->disambiguatePrefixRule1b($context->getCurrentWord());
            $lookup = $context->getDictionary()->lookup($result);
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

    /** 
     * Disambiguate Prefix Rule 1a
     * Rule 1a : berV -> ber-V
     * @return string
     */
    public function disambiguatePrefixRule1a($word)
    {   
        $matches  = null;
        $contains = preg_match('/^ber([aiueo].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }

    /**
     * Disambiguate Prefix Rule 1b
     * Rule 1b : berV -> be-rV
     */
    public function disambiguatePrefixRule1b($word)
    {
        $matches  = null;
        $contains = preg_match('/^ber([aiueo].*)$/', $word, $matches);

        if ($contains === 1) {
            return 'r' . $matches[1];
        }
    }
}
