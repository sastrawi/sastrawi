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
 * Remove Inflectional particle.
 *
 * Asian J. (2007) “Effective Techniques for Indonesian Text Retrieval”. page 60
 * @link http://researchbank.rmit.edu.au/eserv/rmit:6312/Asian.pdf
 */
class RemoveInflectionalParticle implements VisitorInterface
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
                'P'
            );

            $context->addRemoval($removal);
            $context->setCurrentWord($result);
        }
    }

    /**
     * Remove inflectional particle : lah|kah|tah|pun
     * @param string $word
     */
    public function remove($word)
    {
        return preg_replace('/-*(lah|kah|tah|pun)$/', '', $word, 1);
    }
}
