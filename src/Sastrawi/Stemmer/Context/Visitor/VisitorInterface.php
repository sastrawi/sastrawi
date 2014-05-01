<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Context\Visitor;

use Sastrawi\Stemmer\Context\ContextInterface;

/**
 * Context visitor interface. See visitor design pattern.
 *
 * @link http://en.wikipedia.org/wiki/Visitor_pattern
 */
interface VisitorInterface
{
    /**
     * @return void
     */
    public function visit(ContextInterface $context);
}
