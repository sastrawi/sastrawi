<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 6a
 * Rule 6a : terV -> ter-V
 */
class DisambiguatorPrefixRule6aTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule6a();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('ancam', $this->subject->disambiguate('terancam'));
        $this->assertNull($this->subject->disambiguate('terbalik'));
    }
}
