<?php

namespace Sastrawi\Stemmer\Context\Visitor;

class PrefixDisambiguator extends AbstractDisambiguatePrefixRule implements VisitorInterface
{
    public function __construct(array $disambiguators)
    {
        $this->addDisambiguators($disambiguators);
    }

    public function initDisambiguators()
    {
    }
}
