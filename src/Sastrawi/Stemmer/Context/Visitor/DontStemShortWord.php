<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Context\Visitor;

use Sastrawi\Stemmer\Context\ContextInterface;

class DontStemShortWord implements VisitorInterface
{
    public function visit(ContextInterface $context)
    {
        if ($this->isShortWord($context->getCurrentWord())) {
            $context->stopProcess();
        }
    }

    /**
     * @param string $word
     */
    protected function isShortWord($word)
    {
        return (strlen($word) <= 3);
    }
}
