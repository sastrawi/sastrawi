<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 39b (CC infix rules)
 * Rule 39b : CemV -> CV
 */

class DisambiguatorPrefixRule39bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule39b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('tali', $this->subject->disambiguate('temali'));
        $this->assertEquals('getar', $this->subject->disambiguate('gemetar'));
        $this->assertEquals('guruh', $this->subject->disambiguate('gemuruh'));
        $this->assertEquals('kerlip', $this->subject->disambiguate('kemerlip'));
        $this->assertEquals('kerlap', $this->subject->disambiguate('kemerlap'));
        $this->assertEquals('kelut', $this->subject->disambiguate('kemelut'));
    }
}
