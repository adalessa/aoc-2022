<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Day02;
use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{
    /**
     * @test
     */
    public function testPartOne(): void
    {
        $cut = new Day02(__DIR__ . '/../../inputs/day02/01/test.txt');
        $this->assertEquals(15, $cut->partOne());
    }

    /**
     * @test
     */
    public function testPartTwo(): void
    {
        $cut = new Day02(__DIR__ . '/../../inputs/day02/01/test.txt');
        $this->assertEquals(12, $cut->partTwo());
    }
}
