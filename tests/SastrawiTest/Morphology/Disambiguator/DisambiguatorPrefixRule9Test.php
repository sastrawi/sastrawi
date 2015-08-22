<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 9
 * Rule 9 : te-C1erC2 -> te-C1erC2 where C1 != 'r'
 */
class DisambiguatorPrefixRule9Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule9();
    }

    public function testDisambiguate()
    {
        //TODO - need a real world example
        $this->assertEquals('terbang', $this->subject->disambiguate('teterbang'));
        $this->assertNull($this->subject->disambiguate('terperuk'));
    }
}
