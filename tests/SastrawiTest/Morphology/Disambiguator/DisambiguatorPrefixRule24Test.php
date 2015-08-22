<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 24
 * Rule 24 : perCAerV -> per-CAerV where C != 'r'
 */
class DisambiguatorPrefixRule24Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule24();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('daerah', $this->subject->disambiguate('perdaerah'));
    }
}
