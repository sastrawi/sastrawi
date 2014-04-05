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
     * Test removing inflectional particles lah|kah|tah|pun
     */
    public function testRemoveInflectionalParticle()
    {
        $this->assertEquals('dia', $this->stemmer->removeInflectionalParticle('dialah'));
        $this->assertEquals('benar', $this->stemmer->removeInflectionalParticle('benarkah'));
        $this->assertEquals('apa', $this->stemmer->removeInflectionalParticle('apatah'));
        $this->assertEquals('siapa', $this->stemmer->removeInflectionalParticle('siapapun'));
    }

    /**
     * Test removing inflectional possessive pronoun ku|mu|nya
     */
    public function testRemoveInflectionalPossessivePronoun()
    {
        $this->assertEquals('kemeja', $this->stemmer->removeInflectionalPossessivePronoun('kemejaku'));
        $this->assertEquals('baju', $this->stemmer->removeInflectionalPossessivePronoun('bajumu'));
        $this->assertEquals('celana', $this->stemmer->removeInflectionalPossessivePronoun('celananya'));
    }
    
    /**
     * Test removing derivational suffixes i|kan|an
     */
    public function testRemoveDerivationalSuffix()
    {
        $this->assertEquals('menghantu', $this->stemmer->removeDerivationalSuffix('menghantui'));
        $this->assertEquals('membeli', $this->stemmer->removeDerivationalSuffix('membelikan'));
        $this->assertEquals('penjual', $this->stemmer->removeDerivationalSuffix('penjualan'));
    }

    /**
     * Test get removed affix
     */
    public function testGetRemovedAffix()
    {
        $this->assertEquals('i', $this->stemmer->getRemovedAffix('menghantui', 'menghantu'));
        $this->assertEquals('kan', $this->stemmer->getRemovedAffix('membelikan', 'membeli'));
        $this->assertEquals('an', $this->stemmer->getRemovedAffix('penjualan', 'penjual'));
    }

    /**
     * Test removing plain prefixes di|ke|se
     */
    public function testRemovePlainPrefix()
    {
        $this->assertEquals('buang', $this->stemmer->removePlainPrefix('dibuang'));
        $this->assertEquals('sakitan', $this->stemmer->removePlainPrefix('kesakitan'));
        $this->assertEquals('kuat', $this->stemmer->removePlainPrefix('sekuat'));
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

    /**
     * Rule 1a : berV -> ber-V 
     */
    public function testDisambiguatePrefixRule1a()
    {
        $this->assertEquals('adu', $this->stemmer->disambiguatePrefixRule1a('beradu'));
    }

    /**
     * Rule 1a : berV -> be-rV 
     */
    public function testDisambiguatePrefixRule1b()
    {
        $this->assertEquals('rambut', $this->stemmer->disambiguatePrefixRule1b('berambut'));
    }

    /**
     * Rule 2 : berCAP -> ber-CAP where C != 'r' AND P != 'er'
     */
    public function testDisambiguatePrefixRule2()
    {
        $this->assertEquals('suara', $this->stemmer->disambiguatePrefixRule2('bersuara'));
    }
}
