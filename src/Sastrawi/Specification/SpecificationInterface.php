<?php

namespace Sastrawi\Specification;

interface SpecificationInterface
{
    /**
     * return boolean
     */
    public function isSatisfiedBy($value);
}
