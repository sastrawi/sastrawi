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
                'baru', 'ajar',
                'tangkap', 'kupas',
                'minum', 'pukul',
                'cinta', 'dua', 'dahulu', 'jauh', 'jarah', 'ziarah',
                'nuklir', 'nasihat', 'gila', 'hajar', 'qasar', 'udara',
                'populer', 'warna', 'yoga', 'adil', 'rumah', 'muka', 'labuh', 'tarung',
                'tebar', 'indah', 'daya', 'untung', 'sepuluh', 'ekonomi', 'makmur', 'telah', 'serta',
                'percaya', 'pengaruh', 'kritik', 'seko', 'sekolah', 'tahan', 'capa', 'capai',
                'mula', 'mulai', 'petan', 'tani', 'aba', 'abai', 'balas', 'balik',
                'peran', 'medan', 'syukur', 'syarat', 'bom', 'promosi', 'proteksi', 'prediksi', 'kaji',
                'sembunyi', 'langgan', 'laku', 'baik', 'terang', 'iman', 'bisik', 'taat', 'puas', 'makan',
                'nyala', 'nyanyi', 'nyata', 'nyawa', 'rata', 'lembut', 'ligas',
                'budaya', 'karya', 'ideal', 'final',
                // sastrawi additional rules
                'taat', 'tiru', 'sepak', 'kuasa', 'malaikat', 'nikmat', 'stabil', 'transkripsi',
                'lewat', 'nganga', 'allah',
            )
        );
        $this->stemmer = new Stemmer($this->dictionary);
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
        $data[] = array('kesakitan', 'sakit');
        $data[] = array('sesuap', 'suap');

        //$data[] = array('teriakanmu', 'teriak'); // wtf? kok jadi ria?
        //teriakanmu -> te-ria-kan-mu

        /* template formulas for derivation prefix rules (disambiguation) */

        // rule 1a : berV -> ber-V
        $data[] = array('beradu', 'adu');

        // rule 1b : berV -> be-rV
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
        $data[] = array('memperbarui', 'baru');
        $data[] = array('mempelajari', 'ajar');

        // rule 13a : mem{rV|V} -> mem{rV|V}
        $data[] = array('meminum', 'minum');

        // rule 13b : mem{rV|V} -> me-p{rV|V}
        $data[] = array('memukul', 'pukul');

        // rule 14 : men{c|d|j|z} -> men-{c|d|j|z}
        $data[] = array('mencinta', 'cinta');
        $data[] = array('mendua', 'dua');
        $data[] = array('menjauh', 'jauh');
        $data[] = array('menziarah', 'ziarah');

        // rule 15a : men{V} -> me-n{V}
        $data[] = array('menuklir', 'nuklir');

        // rule 15b : men{V} -> me-t{V}
        $data[] = array('menangkap', 'tangkap');

        // rule 16 : meng{g|h|q} -> meng-{g|h|q}
        $data[] = array('menggila', 'gila');
        $data[] = array('menghajar', 'hajar');
        $data[] = array('mengqasar', 'qasar');

        // rule 17a : mengV -> meng-V
        $data[] = array('mengudara', 'udara');

        // rule 17b : mengV -> meng-kV
        $data[] = array('mengupas', 'kupas');

        // rule 18 : menyV -> meny-sV
        $data[] = array('menyuarakan', 'suara');

        // rule 19 : mempV -> mem-pV where V != 'e'
        $data[] = array('mempopulerkan', 'populer');

        // rule 20 : pe{w|y}V -> pe-{w|y}V
        $data[] = array('pewarna', 'warna');
        $data[] = array('peyoga', 'yoga');

        // rule 21a : perV -> per-V
        $data[] = array('peradilan', 'adil');

        // rule 21b : perV -> pe-rV
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

        // rule 26a : pem{rV|V} -> pe-m{rV|V}
        $data[] = array('peminum', 'minum');

        // rule 26b : pem{rV|V} -> pe-p{rV|V}
        $data[] = array('pemukul', 'pukul');

        // rule 27 : men{c|d|j|z} -> men-{c|d|j|z}
        $data[] = array('pencinta', 'cinta');
        $data[] = array('pendahulu', 'dahulu');
        $data[] = array('penjarah', 'jarah');
        $data[] = array('penziarah', 'ziarah');

        // rule 28a : pen{V} -> pe-n{V}
        $data[] = array('penasihat', 'nasihat');

        // rule 28b : pen{V} -> pe-t{V}
        $data[] = array('penangkap', 'tangkap');

        // rule 29 : peng{g|h|q} -> peng-{g|h|q}
        $data[] = array('penggila', 'gila');
        $data[] = array('penghajar', 'hajar');
        $data[] = array('pengqasar', 'qasar');

        // rule 30a : pengV -> peng-V
        $data[] = array('pengudara', 'udara');

        // rule 30b : pengV -> peng-kV
        $data[] = array('pengupas', 'kupas');

        // rule 31 : penyV -> peny-sV
        $data[] = array('penyuara', 'suara');

        // rule 32 : pelV -> pe-lV except pelajar -> ajar
        $data[] = array('pelajar', 'ajar');
        $data[] = array('pelabuhan', 'labuh');

        // rule 33 : peCerV -> per-erV where C != {r|w|y|l|m|n}
        // TODO : find the examples

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
        $data[] = array('mencapai', 'capai');
        $data[] = array('dimulai', 'mulai');
        $data[] = array('petani', 'tani');
        $data[] = array('terabai', 'abai');

        // ECS
        $data[] = array('mensyaratkan', 'syarat');
        $data[] = array('mensyukuri', 'syukur');
        $data[] = array('mengebom', 'bom');
        $data[] = array('mempromosikan', 'promosi');
        $data[] = array('memproteksi', 'proteksi');
        $data[] = array('memprediksi', 'prediksi');
        $data[] = array('pengkajian', 'kaji');
        $data[] = array('pengebom', 'bom');

        // ECS loop pengembalian akhiran
        $data[] = array('bersembunyi', 'sembunyi');
        $data[] = array('bersembunyilah', 'sembunyi');
        $data[] = array('pelanggan', 'langgan');
        $data[] = array('pelaku', 'laku');
        $data[] = array('pelangganmukah', 'langgan');
        $data[] = array('pelakunyalah', 'laku');

        $data[] = array('perbaikan', 'baik');
        $data[] = array('kebaikannya', 'baik');
        $data[] = array('bisikan', 'bisik');
        $data[] = array('menerangi', 'terang');
        $data[] = array('berimanlah', 'iman');

        $data[] = array('memuaskan', 'puas');
        $data[] = array('berpelanggan', 'langgan');
        $data[] = array('bermakanan', 'makan');

        // CC (Modified ECS)
        $data[] = array('menyala', 'nyala');
        $data[] = array('menyanyikan', 'nyanyi');
        $data[] = array('menyatakannya', 'nyata');

        $data[] = array('penyanyi', 'nyanyi');
        $data[] = array('penyawaan', 'nyawa');

        // CC infix
        $data[] = array('rerata', 'rata');
        $data[] = array('lelembut', 'lembut');
        $data[] = array('lemigas', 'ligas');
        $data[] = array('kinerja', 'kerja');

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
        $data[] = array('menahan', 'tahan');

        // test stem multiple sentences
        $multipleSentence1 = 'Cinta telah bertebaran.Keduanya saling mencintai.';
        $multipleSentence2 = "(Cinta telah bertebaran)\n\n\n\nKeduanya saling mencintai.";
        $data[]            = array($multipleSentence1, 'cinta telah tebar dua saling cinta');
        $data[]            = array($multipleSentence2, 'cinta telah tebar dua saling cinta');

        // failed on other method / algorithm but we should succeed
        $data[] = array('peranan', 'peran');
        $data[] = array('memberikan', 'beri');
        $data[] = array('medannya', 'medan');

        // TODO:
        //$data[] = array('sebagai', 'bagai');
        //$data[] = array('bagian', 'bagian');
        //$data[] = array('berbadan', 'badan');
        //$data[] = array('abdullah', 'abdullah');

        // adopted foreign suffixes
        //$data[] = array('budayawan', 'budaya');
        //$data[] = array('karyawati', 'karya');
        $data[] = array('idealis', 'ideal');
        $data[] = array('idealisme', 'ideal');
        $data[] = array('finalisasi', 'final');

        // sastrawi additional rules
        $data[] = array('penstabilan', 'stabil');
        $data[] = array('pentranskripsi', 'transkripsi');

        $data[] = array('mentaati', 'taat');
        $data[] = array('meniru-nirukan', 'tiru');
        $data[] = array('menyepak-nyepak', 'sepak');

        $data[] = array('melewati', 'lewat');
        $data[] = array('menganga', 'nganga');

        $data[] = array('kupukul', 'pukul');
        $data[] = array('kauhajar', 'hajar');

        $data[] = array('kuasa-Mu', 'kuasa');
        $data[] = array('malaikat-malaikat-Nya', 'malaikat');
        $data[] = array('nikmat-Ku', 'nikmat');
        $data[] = array('allah-lah', 'allah');

        return $data;
    }
}
