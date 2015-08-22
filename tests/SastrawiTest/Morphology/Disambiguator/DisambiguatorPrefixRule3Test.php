<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
* Disambiguate Prefix Rule 3
* Rule 3 : berCAerV -> ber-CAerV where C != 'r'
*
*/
class DisambiguatorPrefixRule3Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule3();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('hierarki', $this->subject->disambiguate('berhierarki'));
    }
}
