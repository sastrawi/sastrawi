<?php

namespace Sastrawi\Stemmer\Context\Visitor;

use Sastrawi\Stemmer\Context\ContextInterface;
use Sastrawi\Stemmer\Context\Removal;

class RemoveInflectionalParticle implements VisitorInterface
{
    public function visit(ContextInterface $context)
    {
        $result = $this->removeInflectionalParticle($context->getCurrentWord());

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
     * Remove inflectional particle : lah|kah|tah|pun
     * @param string $word
     */
    public function removeInflectionalParticle($word)
    {
        return preg_replace('/(lah|kah|tah|pun)$/', '', $word, 1);
    }
}
