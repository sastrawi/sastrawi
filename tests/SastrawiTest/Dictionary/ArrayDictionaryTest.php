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
        $this->assertEquals(null, $this->dictionary->searchFor('word'));
        $this->dictionary->add('word');
        $this->assertEquals('word', $this->dictionary->searchFor('word'));
    }

    public function testAddAndContain()
    {
        $this->assertFalse($this->dictionary->contains('word'));
        $this->dictionary->add('word');
        $this->assertTrue($this->dictionary->contains('word'));
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
        $this->assertEquals('word1', $this->dictionary->searchFor('word1'));
        $this->assertEquals('word2', $this->dictionary->searchFor('word2'));
    }

    public function testConstructorPreserveWords()
    {
        $words = array(
            'word1',
            'word2',
        );

        $dictionary = new ArrayDictionary($words);
        $this->assertEquals(2, $dictionary->count());
        $this->assertEquals('word1', $dictionary->searchFor('word1'));
        $this->assertEquals('word2', $dictionary->searchFor('word2'));
    }
}
