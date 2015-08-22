<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 16
 * Original Nazief and Adriani's Rule 16 : meng{g|h|q} -> meng-{g|h|q}
 * Modified Jelita Asian's CS Rule 16 : meng{g|h|q|k} -> meng-{g|h|q|k} to stem mengkritik
 */
class DisambiguatorPrefixRule16Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule16();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('gunakan', $this->subject->disambiguate('menggunakan'));
        $this->assertEquals('hambat', $this->subject->disambiguate('menghambat'));
        $this->assertEquals('qasar', $this->subject->disambiguate('mengqasar'));
        $this->assertEquals('kritik', $this->subject->disambiguate('mengkritik'));

        $this->assertNull($this->subject->disambiguate('mengira'));
    }
}
