<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule no 14
 *
 * Rule 14 modified by Andy Librian : men{c|d|j|s|t|z} -> men-{c|d|j|s|t|z}
 * in order to stem mentaati
 *
 * Rule 14 modified by ECS: men{c|d|j|s|z} -> men-{c|d|j|s|z}
 * in order to stem mensyaratkan, mensyukuri
 *
 * Original CS Rule no 14 was : men{c|d|j|z} -> men-{c|d|j|z}
 */

class DisambiguatorPrefixRule14Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule14();
    }

    public function testDisambiguate()
    {
        $this->assertEquals('cantum', $this->subject->disambiguate('mencantum'));
        $this->assertEquals('duduki', $this->subject->disambiguate('menduduki'));
        $this->assertEquals('jemput', $this->subject->disambiguate('menjemput'));
        $this->assertEquals('syukuri', $this->subject->disambiguate('mensyukuri'));
        $this->assertEquals('syaratkan', $this->subject->disambiguate('mensyaratkan'));
        $this->assertEquals('taati', $this->subject->disambiguate('mentaati'));
        $this->assertEquals('ziarahi', $this->subject->disambiguate('menziarahi'));

        $this->assertNull($this->subject->disambiguate('menyayangi'));
    }
}
