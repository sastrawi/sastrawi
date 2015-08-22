<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 20
 * Rule 20 : pe{w|y}V -> pe-{w|y}V
 */
class DisambiguatorPrefixRule20Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule20();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('warna', $this->subject->disambiguate('pewarna'));
        $this->assertEquals('yoga', $this->subject->disambiguate('peyoga'));
    }
}
