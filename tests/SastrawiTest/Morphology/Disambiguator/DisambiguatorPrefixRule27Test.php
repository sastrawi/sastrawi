<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 27
 * Rule 27 : pen{c|d|j|z} -> pen-{c|d|j|z}
 */
class DisambiguatorPrefixRule27Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule27();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('cari', $this->subject->disambiguate('pencari'));
        $this->assertEquals('daki', $this->subject->disambiguate('pendaki'));
        $this->assertEquals('jual', $this->subject->disambiguate('penjual'));
    }
}
