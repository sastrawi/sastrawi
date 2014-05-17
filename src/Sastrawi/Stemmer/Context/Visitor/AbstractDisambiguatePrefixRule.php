<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Context\Visitor;

use Sastrawi\Stemmer\Context\ContextInterface;
use Sastrawi\Stemmer\Context\Removal;
use Sastrawi\Morphology\Disambiguator\DisambiguatorInterface;

abstract class AbstractDisambiguatePrefixRule implements VisitorInterface
{
    protected $disambiguators = array();

    public function visit(ContextInterface $context)
    {
        $result = null;

        foreach ($this->disambiguators as $disambiguator) {
            $result = $disambiguator->disambiguate($context->getCurrentWord());

            if ($context->getDictionary()->contains($result)) {
                break;
            }
        }

        if ($result === null) {
            return;
        }

        $removedPart = preg_replace("/$result/", '', $context->getCurrentWord(), 1);

        $removal = new Removal(
            $this,
            $context->getCurrentWord(),
            $result,
            $removedPart,
            'DP'
        );

        $context->addRemoval($removal);
        $context->setCurrentWord($result);
    }

    public function addDisambiguators(array $disambiguators)
    {
        foreach ($disambiguators as $disambiguator) {
            $this->addDisambiguator($disambiguator);
        }
    }

    public function addDisambiguator(DisambiguatorInterface $disambiguator)
    {
        $this->disambiguators[] = $disambiguator;
    }
}
