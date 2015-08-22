<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 38a (CC infix rules)
 * Rule 38a : CelV -> CelV
 */

class DisambiguatorPrefixRule38aTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule38a();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('pelawat', $this->subject->disambiguate('pelawat'));
    }
}
