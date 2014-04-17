<?php

namespace Sastrawi\Stemmer\CS;

use Sastrawi\Specification\SpecificationInterface;

class PrecedenceAdjustmentSpecification implements SpecificationInterface
{
    public function isSatisfiedBy($value)
    {
        $regexRules = array(
            '/^be(.*)lah$/',
        );

        foreach ($regexRules as $rule) {
            if (preg_match($rule, $value)) {
                return true;
            }
        }

        return false;
    }
}
