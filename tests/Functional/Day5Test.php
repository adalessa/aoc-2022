<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Day05;
use PHPUnit\Framework\TestCase;

class Day5Test extends TestCase
{
    public function testPartOne(): void
    {
        $cut = new Day05(__DIR__ . '/../../inputs/day05/test.txt');
        $this->assertEquals("CMZ", $cut->partOne());
    }

    public function testPartTwo(): void
    {
        $cut = new Day05(__DIR__ . '/../../inputs/day05/test.txt');
        $this->assertEquals("MCD", $cut->partTwo());
    }
}
