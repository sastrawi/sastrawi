<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 28b
 * Rule 28b : pen{V} -> pe-t{V}
 */
class DisambiguatorPrefixRule28bTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule28b();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('tari', $this->subject->disambiguate('penari'));
        $this->assertEquals('terap', $this->subject->disambiguate('penerap'));
        $this->assertEquals('tinggalan', $this->subject->disambiguate('peninggalan'));
        $this->assertEquals('tolong', $this->subject->disambiguate('penolong'));
        $this->assertEquals('tulis', $this->subject->disambiguate('penulis'));
    }
}
