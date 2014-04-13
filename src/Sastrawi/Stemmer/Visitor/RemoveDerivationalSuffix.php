<?php

namespace Sastrawi\Stemmer\Visitor;

use Sastrawi\Stemmer\VisitorInterface;
use Sastrawi\Stemmer\ContextInterface;
use Sastrawi\Stemmer\Removal;

class RemoveDerivationalSuffix implements VisitorInterface
{
    public function visit(ContextInterface $context)
    {
        $result = $this->removeDerivationalSuffix($context->getCurrentWord());

        if ($result != $context->getCurrentWord()) {
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
    }
    
    /**
     * Remove derivational suffix
     */
    public function removeDerivationalSuffix($word)
    {
        return preg_replace('/(i|kan|an)$/', '', $word, 1);
    }
}
