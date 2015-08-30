<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 23
 * Rule 23 : perCAP -> per-CAP where C != 'r' AND P != 'er'
 */
class DisambiguatorPrefixRule23Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule23();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('tahan', $this->subject->disambiguate('pertahan'));
    }
}
