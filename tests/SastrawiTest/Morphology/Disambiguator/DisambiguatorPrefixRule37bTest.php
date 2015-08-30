<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 37b (CC infix rules)
 * Rule 37b : CerV -> CV
 */

class DisambiguatorPrefixRule37bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule37b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('gigi', $this->subject->disambiguate('gerigi'));
        $this->assertEquals('sabut', $this->subject->disambiguate('serabut'));
    }
}
