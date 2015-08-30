<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 15b
 * Rule 15 : men{V} -> me-t{V}
 */
class DisambiguatorPrefixRule15bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule15b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('tulis', $this->subject->disambiguate('menulis'));
        $this->assertEquals('tari', $this->subject->disambiguate('menari'));

        $this->assertNull($this->subject->disambiguate('menyayangi'));
    }
}
