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

/**
 * Remove Derivational Suffix.
 *
 * Asian J. (2007) “Effective Techniques for Indonesian Text Retrieval”. page 61
 * @link http://researchbank.rmit.edu.au/eserv/rmit:6312/Asian.pdf
 */
class RemoveDerivationalSuffix implements VisitorInterface
{
    public function visit(ContextInterface $context)
    {
        $result = $this->removeSuffix($context->getCurrentWord());

        if ($result != $context->getCurrentWord()) {
            $removedPart = preg_replace("/$result/", '', $context->getCurrentWord(), 1);

            $removal = new Removal(
                $this,
                $context->getCurrentWord(),
                $result,
                $removedPart,
                'DS'
            );

            $context->addRemoval($removal);
            $context->setCurrentWord($result);
        }
    }

    /**
     * Remove derivational suffix
     * Original rule : i|kan|an
     * Added the adopted foreign suffix rule : is|isme|isasi
     *
     * @param  string $word
     * @return string word after its derivational suffix removed
     */
    public function removeSuffix($word)
    {
        return preg_replace('/(is|isme|isasi|i|kan|an)$/', '', $word, 1);
    }
}
