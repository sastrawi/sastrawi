<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
* Disambiguate Prefix Rule 1a
* Rule 1a : berV -> ber-V
*/
class DisambiguatorPrefixRule1aTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule1a();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('ia-ia', $this->subject->disambiguate('beria-ia'));
        $this->assertNull($this->subject->disambiguate('berlari'));
    }
}
