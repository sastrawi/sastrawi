<?php

namespace Sastrawi\Stemmer\Visitor;

use Sastrawi\Stemmer\VisitorInterface;
use Sastrawi\Stemmer\ContextInterface;
use Sastrawi\Stemmer\Removal;

class RemoveInflectionalPossessivePronoun implements VisitorInterface
{
    public function visit(ContextInterface $context)
    {
        $result = $this->removeInflectionalPossessivePronoun($context->getCurrentWord());

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
     * Remove inflectional possessive pronoun : ku|mu|nya
     * @param string $word
     */
    public function removeInflectionalPossessivePronoun($word)
    {
        return preg_replace('/(ku|mu|nya)$/', '', $word, 1);
    }
}
