<?php

namespace SastrawiTest\Stemmer;

use Sastrawi\Stemmer\Stemmer;

class StemmerTest extends \PHPUnit_Framework_TestCase
{
    protected $stemmer;
    
    public function setUp()
    {
        $this->stemmer = new Stemmer();
    }
    
    /**
     * Test removing inflectional particles lah|kah|tah|pun
     */
    public function testRemoveInflectionalParticle()
    {
        $this->assertEquals('dia', $this->stemmer->removeInflectionalParticle('dialah'));
        $this->assertEquals('benar', $this->stemmer->removeInflectionalParticle('benarkah'));
        $this->assertEquals('apa', $this->stemmer->removeInflectionalParticle('apatah'));
        $this->assertEquals('siapa', $this->stemmer->removeInflectionalParticle('siapapun'));
    }
}
