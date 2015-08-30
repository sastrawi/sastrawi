<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 39a (CC infix rules)
 * Rule 39a : CemV -> CemV
 */

class DisambiguatorPrefixRule39aTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule39a();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('pemain', $this->subject->disambiguate('pemain'));
    }
}
