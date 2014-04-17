<?php

namespace SastrawiTest\Morphology;

class InvalidAffixPairSpecificationTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->specification = new \Sastrawi\Morphology\InvalidAffixPairSpecification();
    }

    /**
     * Test contains invalid affix pair ber-i|di-an|ke-i|ke-kan|me-an|ter-an|per-an
     */
    public function testContainsInvalidAffixPair()
    {
        $this->assertFalse($this->specification->isSatisfiedBy('memberikan'));
        $this->assertFalse($this->specification->isSatisfiedBy('ketahui'));

        $this->assertTrue($this->specification->isSatisfiedBy('berjatuhi'));
        $this->assertTrue($this->specification->isSatisfiedBy('dipukulan'));
        $this->assertTrue($this->specification->isSatisfiedBy('ketiduri'));
        $this->assertTrue($this->specification->isSatisfiedBy('ketidurkan'));
        $this->assertTrue($this->specification->isSatisfiedBy('menduaan'));
        $this->assertTrue($this->specification->isSatisfiedBy('terduaan'));
        $this->assertTrue($this->specification->isSatisfiedBy('perkataan')); // wtf?
    }
}
