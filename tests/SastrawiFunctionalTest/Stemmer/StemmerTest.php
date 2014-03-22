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
        $data = array();
        
        // don't stem short words
        $data[] = array('mei', 'mei');
        $data[] = array('bui', 'bui');
        
        // lookup up the dictionary, to prevent overstemming
        // don't stem nilai to nila
        $data[] = array('nilai', 'nilai');
        
        // lah|kah|tah|pun
        $data[] = array('dialah', 'dia');
        $data[] = array('benarkah', 'benar');
        $data[] = array('apatah', 'apa');
        $data[] = array('siapapun', 'siapa');

        // ku|mu|nya
        $data[] = array('kemejaku', 'kemeja');
        $data[] = array('bajumu', 'baju');
        $data[] = array('celananya', 'celana');

        // i|kan|an
        $data[] = array('hantui', 'hantu');
        $data[] = array('belikan', 'beli');
        $data[] = array('jualan', 'jual');

        // combination of suffixes
        $data[] = array('bukumukah', 'buku');
        $data[] = array('miliknyalah', 'milik');
        $data[] = array('kulitkupun', 'kulit'); 
        $data[] = array('berikanku', 'beri');
        $data[] = array('sakitimu', 'sakit');
        $data[] = array('beriannya', 'beri');
        $data[] = array('kasihilah', 'kasih');
        
        //$data[] = array('teriakanmu', 'teriak'); // wtf? kok jadi teria?

        return $data;
    }
}
