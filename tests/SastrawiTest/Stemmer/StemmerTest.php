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
        $this->dictionary = new ArrayDictionary(array('nilai'));
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
     * Test removing derivational suffixes
     */
    public function testRemoveDerivationalSuffix()
    {
        $this->assertEquals('menghantu', $this->stemmer->removeDerivationalSuffix('menghantui'));
        $this->assertEquals('membeli', $this->stemmer->removeDerivationalSuffix('membelikan'));
        $this->assertEquals('penjual', $this->stemmer->removeDerivationalSuffix('penjualan'));
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
     * if we don't use dictionary lookup
     */
    public function testStemReturnImmediatelyIfFoundOnDictionary()
    {
        $this->assertEquals('nilai', $this->stemmer->stem('nilai'));
    }
}
