<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 29
 * Original Rule 29 : peng{g|h|q} -> peng-{g|h|q}
 * Modified Rule 29 by ECS : pengC -> peng-C
 */

class DisambiguatorPrefixRule29Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule29();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('ganti', $this->subject->disambiguate('pengganti'));
        $this->assertEquals('hajar', $this->subject->disambiguate('penghajar'));
        $this->assertEquals('qasar', $this->subject->disambiguate('pengqasar'));
    }
}
