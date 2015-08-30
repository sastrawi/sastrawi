<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 12
 * Nazief and Adriani Rule 12 : mempe{r|l} -> mem-pe{r|l}
 * Modified by Jelita Asian's CS Rule 12 : mempe -> mem-pe to stem mempengaruhi
 */
class DisambiguatorPrefixRule12Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule12();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('pengaruhi', $this->subject->disambiguate('mempengaruhi'));
        $this->assertEquals('perbaharui', $this->subject->disambiguate('memperbaharui'));

        $this->assertNull($this->subject->disambiguate('mewarnai'));
    }
}
