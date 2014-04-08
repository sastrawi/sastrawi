<?php

namespace SastrawiTest\Dictionary;

use Sastrawi\Dictionary\ArrayDictionary;

class ArrayDictionaryTest extends \PHPUnit_Framework_TestCase
{
    protected $dictionary;

    public function setUp()
    {
        $this->dictionary = new ArrayDictionary();
    }

    public function testDictionaryImplementsDictionaryInterface()
    {
        $this->assertInstanceOf('Sastrawi\Dictionary\DictionaryInterface', $this->dictionary);
    }

    public function testAddAndLookupWord()
    {
        $this->assertEquals(null, $this->dictionary->lookup('word'));
        $this->dictionary->add('word');
        $this->assertEquals('word', $this->dictionary->lookup('word'));
    }

    public function testAddCountWord()
    {
        $this->assertEquals(0, $this->dictionary->count());
        $this->dictionary->add('word');
        $this->assertEquals(1, $this->dictionary->count());
    }

    public function testAddWords()
    {
        $words = array(
            'word1',
            'word2',
        );

        $this->dictionary->addWords($words);
        $this->assertEquals(2, $this->dictionary->count());
        $this->assertEquals('word1', $this->dictionary->lookup('word1'));
        $this->assertEquals('word2', $this->dictionary->lookup('word2'));
    }

    public function testConstructorPreserveWords()
    { 
        $words = array(
            'word1',
            'word2',
        );

        $dictionary = new ArrayDictionary($words);
        $this->assertEquals(2, $dictionary->count());
        $this->assertEquals('word1', $dictionary->lookup('word1'));
        $this->assertEquals('word2', $dictionary->lookup('word2'));
    }
}
