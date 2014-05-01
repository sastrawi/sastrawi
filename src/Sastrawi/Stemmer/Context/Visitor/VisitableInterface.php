<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Context\Visitor;

/**
 * Part of the Visitor Design Pattern
 *
 * @link http://en.wikipedia.org/wiki/Visitor_pattern
 */
interface VisitableInterface
{
    /**
     * @return void
     */
    public function accept(VisitorInterface $visitor);
}
