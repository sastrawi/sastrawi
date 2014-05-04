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

        return $data;
    }
}
