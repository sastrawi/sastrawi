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
 * Remove Plain Prefix.
 *
 * Asian J. (2007) “Effective Techniques for Indonesian Text Retrieval”. page 61
 * @link http://researchbank.rmit.edu.au/eserv/rmit:6312/Asian.pdf
 */
class RemovePlainPrefix implements VisitorInterface
{
    public function visit(ContextInterface $context)
    {
        $result = $this->remove($context->getCurrentWord());

        if ($result != $context->getCurrentWord()) {
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
    }

    /**
     * Remove plain prefix : di|ke|se
     *
     * @param  string $word
     * @return string
     */
    public function remove($word)
    {
        return preg_replace('/^(di|ke|se)/', '', $word, 1);
    }
}
