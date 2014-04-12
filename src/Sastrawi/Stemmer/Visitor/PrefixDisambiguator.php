<?php

namespace Sastrawi\Stemmer\Visitor;

use Sastrawi\Stemmer\VisitorInterface;

class PrefixDisambiguator
    extends AbstractDisambiguatePrefixRule 
    implements VisitorInterface
{
    public function __construct(array $disambiguators)
    {
        $this->addDisambiguators($disambiguators);
    }

    public function initDisambiguators()
    {
    }
}
