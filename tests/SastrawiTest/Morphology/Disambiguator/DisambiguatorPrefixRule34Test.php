<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 34
 * Rule 34 : peCP -> pe-CP where C != {r|w|y|l|m|n} and P != 'er'
 */

class DisambiguatorPrefixRule34Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule34();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('tarung', $this->subject->disambiguate('petarung'));
    }
}
