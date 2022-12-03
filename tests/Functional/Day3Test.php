<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Day03;
use PHPUnit\Framework\TestCase;

class Day3Test extends TestCase
{
    public function testPartOne(): void
    {
        $cut = new Day03(__DIR__ . '/../../inputs/day03/test.txt');
        $this->assertEquals(157, $cut->partOne());
    }

    public function testPartTwo(): void
    {
        $cut = new Day03(__DIR__ . '/../../inputs/day03/test.txt');
        $this->assertEquals(70, $cut->partTwo());
    }
}
