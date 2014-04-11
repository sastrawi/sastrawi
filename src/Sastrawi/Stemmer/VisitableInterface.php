<?php

namespace Sastrawi\Stemmer;

interface VisitableInterface
{
    public function accept(VisitorInterface $visitor);
}
