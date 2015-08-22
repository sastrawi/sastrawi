<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 21a
 * Rule 21a : perV -> per-V
 */
class DisambiguatorPrefixRule21aTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule21a();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('adilan', $this->subject->disambiguate('peradilan'));
        $this->assertEquals('undikan', $this->subject->disambiguate('perundikan'));
        $this->assertNull($this->subject->disambiguate('perjudikan'));
    }
}
