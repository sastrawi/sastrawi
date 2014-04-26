<?php

namespace Sastrawi\Stemmer\Context;

interface RemovalInterface
{
    /**
     * @return Visitor\VisitorInterface
     */
    public function getVisitor();

    /**
     * @return string
     */
    public function getSubject();

    /**
     * @return string
     */
    public function getResult();

    /**
     * @return string
     */
    public function getRemovedPart();

    /**
     * @return string
     */
    public function getAffixType();
}
