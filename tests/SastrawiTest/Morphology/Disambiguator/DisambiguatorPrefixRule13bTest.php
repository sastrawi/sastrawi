<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 13b
 * Rule 13b : mem{rV|V} -> me-p{rV|V}
 */

class DisambiguatorPrefixRule13bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule13b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('pakai', $this->subject->disambiguate('memakai'));
    }
}
