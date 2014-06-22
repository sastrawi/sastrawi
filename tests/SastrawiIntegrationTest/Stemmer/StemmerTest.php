<?php

namespace SastrawiIntegrationTest\Stemmer;

use Sastrawi\Stemmer\StemmerFactory;

class StemmerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $stemmerFactory = new StemmerFactory();
        $this->stemmer  = $stemmerFactory->createStemmer(false);
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

        $data[] = array('kebijakan', 'bijak');
        $data[] = array('karyawan', 'karya');
        $data[] = array('karyawati', 'karya');
        $data[] = array('kinerja', 'kerja');
        $data[] = array('mengandung', 'kandung');
        $data[] = array('memakan', 'makan');
        $data[] = array('asean', 'asean');
        $data[] = array('pemandu', 'pandu');
        $data[] = array('mengurangi', 'kurang');
        $data[] = array('pemerintah', 'perintah');
        $data[] = array('mengabulkan', 'kabul');
        $data[] = array('mengupas', 'kupas');
        $data[] = array('keterpurukan', 'puruk');
        $data[] = array('ditemukan', 'temu');
        $data[] = array('mengerti', 'erti');
        $data[] = array('kebon', 'kebon');
        $data[] = array('terdepan', 'depan');
        $data[] = array('mengikis', 'kikis');
        $data[] = array('kedudukan', 'duduk');
        $data[] = array('menekan', 'tekan');
        $data[] = array('perusakan', 'rusa'); // overstemming, it's better than perusa
        $data[] = array('ditemui', 'temu');
        $data[] = array('di', 'di');
        $data[] = array('mengalahkan', 'kalah');

        return $data;
    }
}
