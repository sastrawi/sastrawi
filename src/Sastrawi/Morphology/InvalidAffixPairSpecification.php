<?php

namespace Sastrawi\Morphology;

use Sastrawi\Specification\SpecificationInterface;

class InvalidAffixPairSpecification implements SpecificationInterface
{
    public function isSatisfiedBy($word)
    {
        if (preg_match('/^me(.*)kan$/', $word) === 1) {
            return false;
        }

        if ($word == 'ketahui') {
            return false;
        }

        $contains = false
                    || preg_match('/^ber(.*)i$/', $word) === 1
                    || preg_match('/^di(.*)an$/', $word) === 1
                    || preg_match('/^ke(.*)i$/', $word) === 1
                    || preg_match('/^ke(.*)an$/', $word) === 1
                    || preg_match('/^me(.*)an$/', $word) === 1
                    || preg_match('/^ter(.*)an$/', $word) === 1
                    || preg_match('/^per(.*)an$/', $word) === 1;

        return $contains;
    }
}
