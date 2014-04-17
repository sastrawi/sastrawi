<?php

namespace Sastrawi\Stemmer\Context;

interface RemovalInterface
{
    public function getVisitor();

    public function getSubject();

    public function getResult();

    public function getRemovedPart();
}
