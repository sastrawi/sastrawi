<?php

namespace SastrawiFunctionalTest\Stemmer;

use Sastrawi\Dictionary\ArrayDictionary;
use Sastrawi\Stemmer\Stemmer;

class StemmerTest extends \PHPUnit_Framework_TestCase
{
    protected $dictionary;

    protected $stemmer;

    public function setUp()
    {
        $this->dictionary = new ArrayDictionary(array('nilai'));
        $this->stemmer    = new Stemmer($this->dictionary);
    }
    
    /**
     * @dataProvider stemDataProvider
     */
    public function testStem($word, $stem)
    {
        $this->assertEquals($stem, $this->stemmer->stem($word));
    }

    public function stemDataProvider()
    {
        return array(
            array('mei', 'mei'),
            array('bui', 'bui'),
            array('nilai', 'nilai'),
            array('dialah', 'dia'),
            array('benarkah', 'benar'),
            array('apatah', 'apa'),
            array('siapapun', 'siapa'),
            array('kemejaku', 'kemeja'),
            array('bajumu', 'baju'),
            array('celananya', 'celana'),
            array('hantui', 'hantu'),
            array('belikan', 'beli'),
            array('jualan', 'jual'),
        );
    }
}
