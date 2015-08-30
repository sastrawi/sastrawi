<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
* Disambiguate Prefix Rule 2
* Rule 2 : berCAP -> ber-CAP where C != 'r' AND P != 'er'
*/
class DisambiguatorPrefixRule2Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule2();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('tabur', $this->subject->disambiguate('bertabur'));
        $this->assertNull($this->subject->disambiguate('beria-ia'));
    }
}
