<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 11
 * Rule 11 : mem{b|f|v} -> mem-{b|f|v}
 */
class DisambiguatorPrefixRule11Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule11();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('bantu', $this->subject->disambiguate('membantu'));
        $this->assertEquals('fasilitasi', $this->subject->disambiguate('memfasilitasi'));
        $this->assertEquals('vonis', $this->subject->disambiguate('memvonis'));

        $this->assertNull($this->subject->disambiguate('mewarnai'));
    }
}
