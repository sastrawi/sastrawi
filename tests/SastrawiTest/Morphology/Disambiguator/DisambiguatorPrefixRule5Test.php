<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 5
 * Rule 5 : beC1erC2 -> be-C1erC2 where C1 != 'r'
 */
class DisambiguatorPrefixRule5Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule5();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('kerja', $this->subject->disambiguate('bekerja'));
        $this->assertNull($this->subject->disambiguate('belajar'));
    }
}
