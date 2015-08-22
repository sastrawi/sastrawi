<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 36 (CS additional rules)
 * Rule 36 : peC1erC2 -> pe-C1erC2 where C1 != {r|w|y|l|m|n}
 */

class DisambiguatorPrefixRule36Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule36();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('kerja', $this->subject->disambiguate('pekerja'));
        $this->assertEquals('serta', $this->subject->disambiguate('peserta'));
    }
}
