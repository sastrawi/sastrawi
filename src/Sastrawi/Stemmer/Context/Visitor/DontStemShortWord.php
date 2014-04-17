<?php

namespace Sastrawi\Stemmer\Context\Visitor;

use Sastrawi\Stemmer\Context\ContextInterface;

class DontStemShortWord implements VisitorInterface
{
    public function visit(ContextInterface $context)
    {
        if ($this->isShortWord($context->getCurrentWord())) {
            $context->stopProcess();
        }
    }

    /**
     * @param string $word
     */
    protected function isShortWord($word)
    {
        return (strlen($word) <= 3);
    }
}
