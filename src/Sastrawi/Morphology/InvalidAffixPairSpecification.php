<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology;

use Sastrawi\Specification\SpecificationInterface;

/**
 * Asian J. (2007) “Effective Techniques for Indonesian Text Retrieval”. page 26
 * @link http://researchbank.rmit.edu.au/eserv/rmit:6312/Asian.pdf
 */
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

        $invalidAffixes = array(
            '/^ber(.*)i$/',
            '/^di(.*)an$/',
            '/^ke(.*)i$/',
            '/^ke(.*)an$/',
            '/^me(.*)an$/',
            '/^me(.*)an$/',
            '/^ter(.*)an$/',
            '/^per(.*)an$/',
        );

        $contains = false;

        foreach ($invalidAffixes as $invalidAffix) {
            $contains = $contains || preg_match($invalidAffix, $word) === 1;
        }

        return $contains;
    }
}
