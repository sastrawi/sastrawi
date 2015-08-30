<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 18a
 * CC Rule 18a : menyV -> me-nyV to stem menyala -> nyala
 */
class DisambiguatorPrefixRule18aTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule18a();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('nyala', $this->subject->disambiguate('menyala'));
    }
}
