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
        $this->dictionary = new ArrayDictionary(
            array(
                'nilai', 'beri', 'rambut', 'adu', 'suara', 'daerah', 'ajar', 'kerja', 'ternak',
                'asing', 'raup', 'gerak', 'puruk', 'terbang', 'lipat', 'ringkas', 'warna', 'yakin',
                'bangun', 'fitnah', 'vonis',
                'perbaru', 'pelajar', // should be recursive later, regarding of rule no 12
            )
        );
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

        // rule 4 : belajar -> bel-ajar
        $data[] = array('belajar', 'ajar');

        // rule 5 : beC1erC2 -> be-C1erC2 where C1 != {'r'|'l'}
        $data[] = array('bekerja', 'kerja');
        $data[] = array('beternak', 'ternak');

        // rule 6a : terV -> ter-V
        $data[] = array('terasing', 'asing');

        // rule 6b : terV -> te-rV
        $data[] = array('teraup', 'raup');

        // rule 7 : terCerV -> ter-CerV where C != 'r'
        $data[] = array('tergerak', 'gerak');

        // rule 8 : terCP -> ter-CP where C != 'r' and P != 'er'
        $data[] = array('terpuruk', 'puruk');

        // rule 9 : teC1erC2 -> te-C1erC2 where C1 != 'r'
        $data[] = array('teterbang', 'terbang');
        
        // rule 10 : me{l|r|w|y}V -> me-{l|r|w|y}V
        $data[] = array('melipat', 'lipat');
        $data[] = array('meringkas', 'ringkas');
        $data[] = array('mewarnai', 'warna');
        $data[] = array('meyakinkan', 'yakin');

        // rule 11 : mem{b|f|v} -> mem-{b|f|v}
        $data[] = array('membangun', 'bangun');
        $data[] = array('memfitnah', 'fitnah');
        $data[] = array('memvonis', 'vonis');

        // rule 12 : mempe{r|l} -> mem-pe
        // TODO : should be recursive later
        $data[] = array('memperbaru', 'perbaru');
        $data[] = array('mempelajar', 'pelajar');

        return $data;
    }
}
