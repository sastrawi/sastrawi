<?php

namespace SastrawiTest\StopWordRemover;

use Sastrawi\StopWordRemover\StopWordRemoverFactory;

class StopWordRemoverFactoryTest extends \PHPUnit_Framework_TestCase
{
    protected $factory;

    public function setUp()
    {
        $this->factory = new StopWordRemoverFactory();
    }

    public function testCreateStopWordRemover()
    {
        $this->assertInstanceOf(
            'Sastrawi\StopWordRemover\StopWordRemover',
            $this->factory->createStopWordRemover()
        );
    }
}
