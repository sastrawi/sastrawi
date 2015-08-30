<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 30c
 * Rule 30c : pengV -> pengV- where V = 'e'
 */

class DisambiguatorPrefixRule30cTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule30c();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('tahuan', $this->subject->disambiguate('pengetahuan'));
        $this->assertEquals('blog', $this->subject->disambiguate('pengeblog'));
        $this->assertEquals('test', $this->subject->disambiguate('pengetest'));
    }
}
