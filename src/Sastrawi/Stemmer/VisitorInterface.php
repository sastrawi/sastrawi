<?php

namespace Sastrawi\Stemmer;

interface VisitorInterface
{
    public function visit(ContextInterface $context);
}
