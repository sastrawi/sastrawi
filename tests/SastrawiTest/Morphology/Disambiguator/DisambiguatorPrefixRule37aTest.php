<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 37a (CC infix rules)
 * Rule 37a : CerV -> CerV
 */

class DisambiguatorPrefixRule37aTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule37a();
    }

    public function testDisambiguate()
    {
        //TODO: Not sure if this is a good example
        $this->assertEquals('perang', $this->subject->disambiguate('perang'));
    }
}
