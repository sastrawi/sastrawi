<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 30b
 * Rule 30b : pengV -> peng-kV
 */

class DisambiguatorPrefixRule30bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule30b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('kawal', $this->subject->disambiguate('pengawal'));
        $this->assertEquals('ketat', $this->subject->disambiguate('pengetat'));
        $this->assertEquals('kira', $this->subject->disambiguate('pengira'));
        $this->assertEquals('korban', $this->subject->disambiguate('pengorban'));
        $this->assertEquals('kuat', $this->subject->disambiguate('penguat'));
    }
}
