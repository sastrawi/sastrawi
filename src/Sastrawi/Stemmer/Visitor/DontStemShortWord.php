<?php

namespace Sastrawi\Stemmer\Visitor;

use Sastrawi\Stemmer\VisitorInterface;
use Sastrawi\Stemmer\ContextInterface;

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
