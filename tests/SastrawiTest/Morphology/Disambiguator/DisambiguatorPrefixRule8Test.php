<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 8
 * Rule 8 : terCP -> ter-CP where C != 'r' and P != 'er'
 */
class DisambiguatorPrefixRule8Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule8();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('tangkap', $this->subject->disambiguate('tertangkap'));
        $this->assertNull($this->subject->disambiguate('teracun'));
        $this->assertNull($this->subject->disambiguate('terperuk'));
    }
}
