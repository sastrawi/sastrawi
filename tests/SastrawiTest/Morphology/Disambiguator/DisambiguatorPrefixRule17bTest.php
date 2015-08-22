<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 17b
 * Rule 17b : mengV -> meng-kV
 */
class DisambiguatorPrefixRule17bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule17b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('kira', $this->subject->disambiguate('mengira'));
        $this->assertEquals('kecil', $this->subject->disambiguate('mengecil'));
    }
}
