<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\ConfixStripping;

use Sastrawi\Specification\SpecificationInterface;

/**
 * Confix Stripping Rule Precedence Adjustment Specification.
 * Asian J. (2007) “Effective Techniques for Indonesian Text Retrieval” page 78-79.
 *
 * @link   http://researchbank.rmit.edu.au/eserv/rmit:6312/Asian.pdf
 */
class PrecedenceAdjustmentSpecification implements SpecificationInterface
{
    /**
     * @param  string  $value
     * @return boolean
     */
    public function isSatisfiedBy($value)
    {
        $regexRules = array(
            '/^be(.*)lah$/',
            '/^be(.*)an$/',
            '/^me(.*)i$/',
            '/^di(.*)i$/',
            '/^pe(.*)i$/',
            '/^ter(.*)i$/',
        );

        foreach ($regexRules as $rule) {
            if (preg_match($rule, $value)) {
                return true;
            }
        }

        return false;
    }
}
