<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 38b (CC infix rules)
 * Rule 38b : CelV -> CV
 */

class DisambiguatorPrefixRule38bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule38b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('tunjuk', $this->subject->disambiguate('telunjuk'));
        $this->assertEquals('getar', $this->subject->disambiguate('geletar'));
        $this->assertEquals('sidik', $this->subject->disambiguate('selidik'));
        $this->assertEquals('patuk', $this->subject->disambiguate('pelatuk'));
        $this->assertEquals('tapak', $this->subject->disambiguate('telapak'));
        $this->assertEquals('gombang', $this->subject->disambiguate('gelombang'));
    }
}
