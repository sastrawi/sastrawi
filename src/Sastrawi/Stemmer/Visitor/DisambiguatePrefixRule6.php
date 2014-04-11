<?php

namespace Sastrawi\Stemmer\Visitor;

use Sastrawi\Stemmer\VisitorInterface;
use Sastrawi\Stemmer\ContextInterface;
use Sastrawi\Stemmer\Removal;

class DisambiguatePrefixRule6 implements VisitorInterface
{
    public function visit(ContextInterface $context)
    { 
        $result = $this->disambiguatePrefixRule6a($context->getCurrentWord());
        $lookup = $context->getDictionary()->lookup($result);

        if ($lookup === null) {
            $result = $this->disambiguatePrefixRule6b($context->getCurrentWord());
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
     * Disambiguate Prefix Rule 6a
     * Rule 6a : terV -> ter-V
     * @return string
     */
    public function disambiguatePrefixRule6a($word)
    {
        $matches  = null;
        $contains = preg_match('/^ter([aiueo].*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }

    /**
     * Disambiguate Prefix Rule 6b
     * Rule 6b : terV -> te-rV
     */
    public function disambiguatePrefixRule6b($word)
    {
        $matches  = null;
        $contains = preg_match('/^ter([aiueo].*)$/', $word, $matches);

        if ($contains === 1) {
            return 'r' . $matches[1];
        }
    }
}
