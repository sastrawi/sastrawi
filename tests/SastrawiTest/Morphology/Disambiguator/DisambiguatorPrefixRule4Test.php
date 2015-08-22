<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
* Disambiguate Prefix Rule 4
* Rule 4 : belajar -> bel-ajar
*/
class DisambiguatorPrefixRule4Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule4();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('ajar', $this->subject->disambiguate('belajar'));
        $this->assertNull($this->subject->disambiguate('bekerja'));
    }
}
