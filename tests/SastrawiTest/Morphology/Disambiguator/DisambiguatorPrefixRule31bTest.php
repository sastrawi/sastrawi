<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 31b
 * Original Rule 31 : penyV -> peny-sV
 * Modified by CC, shifted to 31b
 */

class DisambiguatorPrefixRule31bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule31b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('salut', $this->subject->disambiguate('penyalut'));
        $this->assertEquals('sekat', $this->subject->disambiguate('penyekat'));
        $this->assertEquals('sikat', $this->subject->disambiguate('penyikat'));
        $this->assertEquals('sukat', $this->subject->disambiguate('penyukat'));
    }
}
