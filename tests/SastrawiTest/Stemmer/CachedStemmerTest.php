<?php

namespace SastrawiTest\Stemmer;

use Sastrawi\Stemmer\CachedStemmer;
use Sastrawi\Stemmer\Cache\ArrayCache;
use Sastrawi\Stemmer\Stemmer;
use Sastrawi\Dictionary\ArrayDictionary;

class CachedStemmerTest extends \PHPUnit_Framework_TestCase
{
    protected $cachedStemmer;

    public function setUp()
    {
        $arrayDictionary = new ArrayDictionary(array('makan'));
        $this->delegatedStemmer = new Stemmer($arrayDictionary);
        $this->arrayCache    = new ArrayCache();
        $this->cachedStemmer = new CachedStemmer($this->arrayCache, $this->delegatedStemmer);
    }

    public function testInstanceOfStemmerInterface()
    {
        $this->assertInstanceOf('Sastrawi\Stemmer\StemmerInterface', $this->cachedStemmer);
    }

    public function testGetCache()
    {
        $this->assertSame($this->arrayCache, $this->cachedStemmer->getCache());
    }

    public function testStemLookupTheCache()
    {
        $this->assertEquals('makan makan', $this->cachedStemmer->stem('memakan makanan'));
        $this->cachedStemmer->getCache()->set('memakan', 'minum');
        $this->assertEquals('minum makan', $this->cachedStemmer->stem('memakan makanan'));
    }

    public function testStemStoreResultToCache()
    {
        $this->assertEquals('makan makan', $this->cachedStemmer->stem('memakan makanan'));
        $this->assertEquals('makan', $this->cachedStemmer->getCache()->get('memakan'));
        $this->assertEquals('makan', $this->cachedStemmer->getCache()->get('makanan'));
    }
}
