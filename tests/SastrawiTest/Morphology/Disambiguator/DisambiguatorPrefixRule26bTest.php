<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 26b
 * Rule 26b : pem{rV|V} -> pe-p{rV|V}
 */
class DisambiguatorPrefixRule26bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule26b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('pilih', $this->subject->disambiguate('pemilih'));
        $this->assertEquals('pukul', $this->subject->disambiguate('pemukul'));
    }
}
