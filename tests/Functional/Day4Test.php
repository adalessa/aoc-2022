<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Day04;
use PHPUnit\Framework\TestCase;

class Day4Test extends TestCase
{
    public function testPartOne(): void
    {
        $cut = new Day04(__DIR__ . '/../../inputs/day04/test.txt');
        $this->assertEquals(2, $cut->partOne());
    }

    public function testPartTwo(): void
    {
        $cut = new Day04(__DIR__ . '/../../inputs/day04/test.txt');
        $this->assertEquals(4, $cut->partTwo());
    }
}
