<?php

namespace Sastrawi\Stemmer;

interface RemovalInterface
{
    public function getVisitor();

    public function getSubject();

    public function getResult();

    public function getRemovedPart();
}
