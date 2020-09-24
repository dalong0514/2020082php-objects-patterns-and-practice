<?php

namespace Tests\Unit;

use App\Code\Calculate;
use App\Code\Math;
use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class MathMockeryTest extends MockeryTestCase
{
    private $calculate;
    private $math;
    public function setUp(): void {
        parent::setUp();
        $this->calculate = m::mock(Calculate::class);
        $this->math = new Math($this->calculate);
    }

    public function testGetArea() {
        $this->calculate->shouldReceive('areaOfSquare')
            ->andReturn(4)
            ->once();
        
            $length = 2;
            $res = $this->math->getArea($length);
            $this->assertEquals(4, $res);
    }
}
