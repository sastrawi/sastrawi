<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 40a (CC infix rules)
 * Rule 40a : CinV -> CinV
 */

class DisambiguatorPrefixRule40aTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule40a();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('pinang', $this->subject->disambiguate('pinang'));
    }
}
