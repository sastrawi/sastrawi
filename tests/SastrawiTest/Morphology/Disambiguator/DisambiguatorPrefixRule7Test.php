<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 7
 * Rule 7 : terCerv -> ter-CerV where C != 'r'
 */
class DisambiguatorPrefixRule7Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule7();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('peruk', $this->subject->disambiguate('terperuk'));
    }
}
