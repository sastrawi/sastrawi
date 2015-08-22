<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 18b
 * Original Rule 18 : menyV -> meny-sV
 * Modified by CC (shifted into 18b, see also 18a)
 */
class DisambiguatorPrefixRule18bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule18b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('sapu', $this->subject->disambiguate('menyapu'));
        $this->assertEquals('sikat', $this->subject->disambiguate('menyikat'));
    }
}
