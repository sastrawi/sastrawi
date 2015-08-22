<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 40b (CC infix rules)
 * Rule 40b : CinV -> CV
 */

class DisambiguatorPrefixRule40bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule40b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('kerja', $this->subject->disambiguate('kinerja'));
        $this->assertEquals('sambung', $this->subject->disambiguate('sinambung'));
        $this->assertEquals('tambah', $this->subject->disambiguate('tinambah'));
    }
}
