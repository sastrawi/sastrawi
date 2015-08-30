<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 32
 * Rule 32 : pelV -> pe-lV except pelajar -> ajar
 */

class DisambiguatorPrefixRule32Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule32();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('ajar', $this->subject->disambiguate('pelajar'));
        $this->assertEquals('layan', $this->subject->disambiguate('pelayan'));
        $this->assertEquals('ledak', $this->subject->disambiguate('peledak'));
        $this->assertEquals('lirik', $this->subject->disambiguate('pelirik'));
        $this->assertEquals('lobi', $this->subject->disambiguate('pelobi'));
        $this->assertEquals('lupa', $this->subject->disambiguate('pelupa'));
    }
}
