<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Context\Visitor;

class PrefixDisambiguator extends AbstractDisambiguatePrefixRule implements VisitorInterface
{
    public function __construct(array $disambiguators)
    {
        $this->addDisambiguators($disambiguators);
    }
}
