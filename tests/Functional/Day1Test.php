<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Day01;
use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    /**
     * @test
     */
    public function partOneTest(): void
    {
        $cut = new Day01(__DIR__ . '/../../inputs/day01/01/test.txt');
        $this->assertEquals(24000, $cut->partOne());
    }

    /**
     * @test
     */
    public function partTwoTest(): void
    {
        $cut = new Day01(__DIR__ . '/../../inputs/day01/01/test.txt');
        $this->assertEquals(45000, $cut->partTwo());
    }

}
