<?php

namespace Sastrawi\Stemmer\Context\Visitor;

use Sastrawi\Stemmer\Context\ContextInterface;
use Sastrawi\Stemmer\Context\Removal;

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
                $removedPart,
                'PP'
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
