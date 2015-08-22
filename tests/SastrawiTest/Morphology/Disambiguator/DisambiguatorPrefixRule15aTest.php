<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 15a
 * Rule 15a : men{V} -> me-n{V}
 */

class DisambiguatorPrefixRule15aTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule15a();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('nikmati', $this->subject->disambiguate('menikmati'));
        $this->assertNull($this->subject->disambiguate('menyayangi'));
    }
}
