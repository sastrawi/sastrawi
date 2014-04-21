<?php

namespace Sastrawi\Stemmer\Context\Visitor;

use Sastrawi\Stemmer\Context\ContextInterface;

interface VisitorInterface
{
    /**
     * @return void
     */
    public function visit(ContextInterface $context);
}
