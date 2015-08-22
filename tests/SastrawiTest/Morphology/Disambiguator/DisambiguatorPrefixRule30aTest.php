<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 30a
 * Rule 30a : pengV -> peng-V
 *
 */

//TODO: Maybe this rule can be combined with rule 29?
class DisambiguatorPrefixRule30aTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule30a();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('alihan', $this->subject->disambiguate('pengalihan'));
        $this->assertEquals('eram', $this->subject->disambiguate('pengeram'));
        $this->assertEquals('ikat', $this->subject->disambiguate('pengikat'));
        $this->assertEquals('obat', $this->subject->disambiguate('pengobat'));
        $this->assertEquals('urusan', $this->subject->disambiguate('pengurusan'));
    }
}
