<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 10
 * Rule 10 : me{l|r|w|y}V -> me-{l|r|w|y}V
 */
class DisambiguatorPrefixRule10Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule10();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('lalui', $this->subject->disambiguate('melalui'));
        $this->assertEquals('racuni', $this->subject->disambiguate('meracuni'));
        $this->assertEquals('warnai', $this->subject->disambiguate('mewarnai'));
        $this->assertEquals('yakini', $this->subject->disambiguate('meyakini'));

        $this->assertNull($this->subject->disambiguate('menyayangi'));
    }
}
