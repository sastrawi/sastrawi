<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Context;

class Removal implements RemovalInterface
{
    protected $visitor;

    protected $subject;

    protected $result;

    protected $removedPart;

    protected $affixType;

    /**
     * @param \Sastrawi\Stemmer\Context\Visitor\VisitorInterface $visitor
     * @param string                                             $subject
     * @param string                                             $result
     * @param string                                             $removedPart
     */
    public function __construct(
        Visitor\VisitorInterface $visitor,
        $subject,
        $result,
        $removedPart,
        $affixType
    ) {
        $this->visitor = $visitor;
        $this->subject = $subject;
        $this->result  = $result;
        $this->removedPart = $removedPart;
        $this->affixType = $affixType;
    }

    public function getVisitor()
    {
        return $this->visitor;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getRemovedPart()
    {
        return $this->removedPart;
    }

    public function getAffixType()
    {
        return $this->affixType;
    }
}
