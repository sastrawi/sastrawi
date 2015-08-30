<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 25
 * Rule 25 : pem{b|f|v} -> pem-{b|f|v}
 */
class DisambiguatorPrefixRule25Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule25();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('baruan', $this->subject->disambiguate('pembaruan'));
        $this->assertEquals('fokusan', $this->subject->disambiguate('pemfokusan'));
        $this->assertEquals('vaksinan', $this->subject->disambiguate('pemvaksinan'));
    }
}
