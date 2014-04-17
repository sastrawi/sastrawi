<?php

namespace Sastrawi\Stemmer\Context\Visitor;

use Sastrawi\Stemmer\Context\ContextInterface;

interface VisitorInterface
{
    public function visit(ContextInterface $context);
}
