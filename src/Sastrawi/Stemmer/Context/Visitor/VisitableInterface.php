<?php

namespace Sastrawi\Stemmer\Context\Visitor;

interface VisitableInterface
{
    public function accept(VisitorInterface $visitor);
}
