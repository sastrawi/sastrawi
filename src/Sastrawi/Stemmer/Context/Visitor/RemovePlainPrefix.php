<?php

namespace Sastrawi\Stemmer\Context\Visitor;

use Sastrawi\Stemmer\Context\ContextInterface;
use Sastrawi\Stemmer\Context\Removal;

class RemovePlainPrefix implements VisitorInterface
{
    public function visit(ContextInterface $context)
    {
        $result = $this->removePlainPrefix($context->getCurrentWord());

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
     * Remove plain prefix : di|ke|se
     */
    public function removePlainPrefix($word)
    {
        return preg_replace('/^(di|ke|se)/', '', $word, 1);
    }
}
