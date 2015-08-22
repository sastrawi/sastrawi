<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 21b
 * Rule 21a : perV -> pe-rV
 */
class DisambiguatorPrefixRule21bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule21b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('rusak', $this->subject->disambiguate('perusak'));
        $this->assertEquals('rancang', $this->subject->disambiguate('perancang'));
        $this->assertNull($this->subject->disambiguate('perjudikan'));
    }
}
