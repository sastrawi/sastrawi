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
        $this->dictionary = new ArrayDictionary(array('nilai', 'beri', 'rambut', 'adu', 'suara', 'daerah'));
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
        $data[] = array('hancurlah', 'hancur');
        $data[] = array('benarkah', 'benar');
        $data[] = array('apatah', 'apa');
        $data[] = array('siapapun', 'siapa');

        // ku|mu|nya
        $data[] = array('jubahku', 'jubah');
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

        // plain prefix
        $data[] = array('dibuang', 'buang');
        //$data[] = array('kesakitan', 'sakit');
        $data[] = array('sesuap', 'suap');

        //$data[] = array('teriakanmu', 'teriak'); // wtf? kok jadi teria?
        
        /* template formulas for derivation prefix rules (disambiguation) */
        
        // rule 1 : berV -> ber-V
        $data[] = array('beradu', 'adu');
        
        // rule 1 : berV -> be-rV
        $data[] = array('berambut', 'rambut');
        
        // rule 2 : berCAP -> ber-CAP
        $data[] = array('bersuara', 'suara');

        // rule 3 : berCAerV -> ber-CAerV where C != 'r'
        $data[] = array('berdaerah', 'daerah');

        return $data;
    }
}
