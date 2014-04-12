<?php

namespace Sastrawi\Stemmer;

class Removal implements RemovalInterface
{
    protected $visitor;

    protected $subject;

    protected $result;

    protected $removedPart;
    
    public function __construct(
        VisitorInterface $visitor,
        $subject,
        $result,
        $removedPart
    ) {
        $this->visitor = $visitor;
        $this->subject = $subject;
        $this->result  = $result;
        $this->removedPart = $removedPart;
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
}
