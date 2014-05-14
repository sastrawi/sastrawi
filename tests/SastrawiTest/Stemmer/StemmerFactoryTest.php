<?php

namespace SastrawiTest\Stemmer;

use Sastrawi\Stemmer\StemmerFactory;

class StemmerFactoryTest extends \PHPUnit_Framework_TestCase
{
    protected $factory;

    public function setUp()
    {
        $this->factory = new StemmerFactory();
    }

    public function testCreateStemmerReturnStemmer()
    {
        $stemmer = $this->factory->createStemmer();

        $this->assertNotNull($stemmer);
        $this->assertInstanceOf('Sastrawi\Stemmer\StemmerInterface', $stemmer);
    }
}
