<?php

namespace SastrawiTest\Stemmer;

use Sastrawi\Stemmer\Stemmer;
use Sastrawi\Dictionary\ArrayDictionary;

class StemmerTest extends \PHPUnit_Framework_TestCase
{
    protected $dictionary;
    
    protected $stemmer;
    
    public function setUp()
    {
        $this->dictionary = new ArrayDictionary(array('beri'));
        $this->stemmer = new Stemmer($this->dictionary);
    }

    /**
     * Test contains invalid affix pair ber-i|di-an|ke-i|ke-kan|me-an|ter-an|per-an
     */
    public function testContainsInvalidAffixPair()
    {
        $this->assertFalse($this->stemmer->containsInvalidAffixPair('memberikan'));
        $this->assertFalse($this->stemmer->containsInvalidAffixPair('ketahui'));
        
        $this->assertTrue($this->stemmer->containsInvalidAffixPair('berjatuhi'));
        $this->assertTrue($this->stemmer->containsInvalidAffixPair('dipukulan'));
        $this->assertTrue($this->stemmer->containsInvalidAffixPair('ketiduri'));
        $this->assertTrue($this->stemmer->containsInvalidAffixPair('ketidurkan'));
        $this->assertTrue($this->stemmer->containsInvalidAffixPair('menduaan'));
        $this->assertTrue($this->stemmer->containsInvalidAffixPair('terduaan'));
        $this->assertTrue($this->stemmer->containsInvalidAffixPair('perkataan')); // wtf?
    }

    /**
     * Don't stem such a short word (three or fewer characters)
     */
    public function testStemReturnImmediatelyOnShortWord()
    {
        $this->assertEquals('mei', $this->stemmer->stem('mei'));
        $this->assertEquals('bui', $this->stemmer->stem('bui'));
    }

    /**
     * To prevent overstemming : nilai could have been overstemmed to nila
     * if we don't lookup against the dictionary
     */
    public function testStemReturnImmediatelyIfFoundOnDictionary()
    {
        $this->assertEquals('nila', $this->stemmer->stem('nilai'));
        $this->stemmer->getDictionary()->add('nilai');
        $this->assertEquals('nilai', $this->stemmer->stem('nilai'));
    }
}
