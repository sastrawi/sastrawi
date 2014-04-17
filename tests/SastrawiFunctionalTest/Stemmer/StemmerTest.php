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
                'hancur', 'benar', 'apa', 'siapa', 'jubah', 'baju', 'beli',
                'celana', 'hantu', 'jual', 'buku', 'milik', 'kulit', 'sakit', 'kasih', 'buang', 'suap',
                'nilai', 'beri', 'rambut', 'adu', 'suara', 'daerah', 'ajar', 'kerja', 'ternak',
                'asing', 'raup', 'gerak', 'puruk', 'terbang', 'lipat', 'ringkas', 'warna', 'yakin',
                'bangun', 'fitnah', 'vonis',
                'perbaru', 'pelajar', // should be recursive later, regarding of rule no 12
                'minum', 'cinta', 'dua', 'jauh', 'ziarah', 'nuklir', 'gila', 'hajar', 'qasar', 'udara',
                'populer', 'warna', 'yoga', 'adil', 'rumah', 'muka', 'labuh', 'tarung',
                'tebar', 'indah', 'daya', 'untung', 'sepuluh', 'ekonomi', 'makmur', 'telah', 'serta',
                'percaya', 'pengaruh', 'kritik', 'seko', 'sekolah', 'tah', 'tahan', 'capa', 'capai',
                'mula', 'mulai', 'petan', 'tani', 'aba', 'abai', 'balas', 'balik',
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

        // rule 13 : mem{rV|V} -> mem{rV|V}
        // TODO : return me-p{rV|V} ?? recoding
        $data[] = array('meminum', 'minum');
        // $data[] = array('memukul', 'pukul');

        // rule 14 : men{c|d|j|z} -> men-{c|d|j|z}
        $data[] = array('mencinta', 'cinta');
        $data[] = array('mendua', 'dua');
        $data[] = array('menjauh', 'jauh');
        $data[] = array('menziarah', 'ziarah');

        // rule 15 : men{V} -> me-n{V}
        // TODO recoding : me-t{V} : menangkap -> me-tangkap
        $data[] = array('menuklir', 'nuklir');

        // rule 16 : meng{g|h|q} -> meng-{g|h|q}
        $data[] = array('menggila', 'gila');
        $data[] = array('menghajar', 'hajar');
        $data[] = array('mengqasar', 'qasar');

        // rule 17 : mengV -> meng-V
        // TODO recoding : mengV -> meng-kV : mengupas -> meng-kupas
        $data[] = array('mengudara', 'udara');

        // rule 18 : menyV -> meny-sV
        // TODO recoding : menyV -> men-sV
        //$data[] = array('menyuarakan', 'suara');

        // rule 19 : mempV -> mem-pV where V != 'e'
        $data[] = array('mempopulerkan', 'populer');

        // rule 20 : pe{w|y}V -> pe-{w|y}V
        $data[] = array('pewarna', 'warna');
        $data[] = array('peyoga', 'yoga');

        // rule 21 : perV -> per-V | pe-rV
        $data[] = array('peradilan', 'adil');
        $data[] = array('perumahan', 'rumah');

        // rule 22 is missing in the document?

        // rule 23 : perCAP -> per-CAP where C != 'r' and P != 'er'
        $data[] = array('permuka', 'muka');

        // rule 24 : perCAerV -> per-CAerV where C != 'r'
        $data[] = array('perdaerah', 'daerah');

        // rule 25 : pem{b|f|v} -> pem-{b|f|v}
        $data[] = array('pembangun', 'bangun');
        $data[] = array('pemfitnah', 'fitnah');
        $data[] = array('pemvonis', 'vonis');

        // rule 26 : pem{rV|V} -> pem{rV|V}
        // TODO : return pe-p{rV|V} ?? recoding
        $data[] = array('peminum', 'minum');
        // $data[] = array('pemukul', 'pukul');

        // rule 27 : men{c|d|j|z} -> men-{c|d|j|z}
        // TODO : should find more relevant examples
        $data[] = array('pencinta', 'cinta');
        $data[] = array('pendua', 'dua');
        $data[] = array('penjauh', 'jauh');
        $data[] = array('penziarah', 'ziarah');

        // rule 28 : pen{V} -> pe-n{V}
        // TODO recoding : pe-t{V} : penangkap -> pe-tangkap
        $data[] = array('penuklir', 'nuklir');

        // rule 29 : peng{g|h|q} -> peng-{g|h|q}
        $data[] = array('penggila', 'gila');
        $data[] = array('penghajar', 'hajar');
        $data[] = array('pengqasar', 'qasar');

        // rule 30 : pengV -> peng-V
        // TODO recoding : pengV -> peng-kV : pengupas -> peng-kupas
        $data[] = array('pengudara', 'udara');

        // rule 31 : menyV -> meng-V
        // TODO recoding : menyV -> men-sV
        //$data[] = array('penyuara', 'suara');

        // rule 32 : pelV -> pe-lV except pelajar -> ajar
        // $data[] = array('pelajar', 'ajar'); // should be opened later, atm it's conflict with rule 12
        $data[] = array('pelabuh', 'labuh');

        // rule 33 : peCerV -> per-erV where C != {r|w|y|l|m|n}
        // can't find the example

        // rule 34 : peCP -> pe-CP where C != {r|w|y|l|m|n} and P != 'er'
        $data[] = array('petarung', 'tarung');

        // CS additional rules

        // rule 35 : terC1erC2 -> ter-C1erC2 where C1 != 'r'
        $data[] = array('terpercaya', 'percaya');

        // rule 36 : peC1erC2 -> pe-C1erC2 where C1 != {r|w|y|l|m|n}
        $data[] = array('pekerja', 'kerja');
        $data[] = array('peserta', 'serta');

        // CS modify rule 12
        $data[] = array('mempengaruhi', 'pengaruh');

        // CS modify rule 16
        $data[] = array('mengkritik', 'kritik');

        // CS adjusting rule precedence
        $data[] = array('bersekolah', 'sekolah');
        $data[] = array('bertahan', 'tahan');
        //$data[] = array('mencapai', 'capai');
        $data[] = array('dimulai', 'mulai');
        $data[] = array('petani', 'tani');
        $data[] = array('terabai', 'abai');

        // plurals
        $data[] = array('buku-buku', 'buku');
        $data[] = array('berbalas-balasan', 'balas');
        $data[] = array('bolak-balik', 'bolak-balik');

        // combination of prefix + suffix
        $data[] = array('bertebaran', 'tebar');
        $data[] = array('terasingkan', 'asing');
        $data[] = array('membangunkan', 'bangun');
        $data[] = array('mencintai', 'cinta');
        $data[] = array('menduakan', 'dua');
        $data[] = array('menjauhi', 'jauh');
        $data[] = array('menggilai', 'gila');
        $data[] = array('pembangunan', 'bangun');

        // return the word if not found in the dictionary
        $data[] = array('marwan', 'marwan');
        $data[] = array('subarkah', 'subarkah');

        // recursively remove prefix
        $data[] = array('memberdayakan', 'daya');
        $data[] = array('persemakmuran', 'makmur');
        $data[] = array('keberuntunganmu', 'untung');
        $data[] = array('kesepersepuluhnya', 'sepuluh');

        // test stem sentence
        $data[] = array('siapakah memberdayakan pembangunan', 'siapa daya bangun');

        // issues
        $data[] = array('Perekonomian', 'ekonomi');

        // test stem multiple sentences
        $multipleSentence = 'Cinta telah bertebaran.Keduanya saling mencintai.';

        $data[] = array($multipleSentence, 'cinta telah tebar dua saling cinta');

        return $data;
    }
}
