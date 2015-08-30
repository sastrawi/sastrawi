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
* Rule 1b : berV -> be-rV
*/
class DisambiguatorPrefixRule1bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule1b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('rakit', $this->subject->disambiguate('berakit'));
        $this->assertNull($this->subject->disambiguate('bertabur'));
    }
}
