<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 19
 * Original Rule 19 : mempV -> mem-pV where V != 'e'
 * Modified Rule 19 by ECS : mempA -> mem-pA where A != 'e' in order to stem memproteksi
 */
class DisambiguatorPrefixRule19Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule19();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('proteksi', $this->subject->disambiguate('memproteksi'));
        $this->assertEquals('patroli', $this->subject->disambiguate('mempatroli'));
    }
}
