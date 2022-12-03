<?php

/* use App\Day01; */
/* use App\Day02; */
use App\Day03;

require("./vendor/autoload.php");

/* $dayOne = new Day01(filePath: __DIR__ . '/inputs/day01/01/input.txt'); */
/* echo "Day One solution part one: " . $dayOne->partOne(); */
/* echo "Day One solution part two: " . $dayOne->partTwo(); */

/* $dayTwo = new Day02(filePath: __DIR__ . '/inputs/day02/01/input.txt'); */
/* echo "Day two solution part one: " . $dayTwo->partOne(); */
/* echo "Day two solution part two: " . $dayTwo->partTwo(); */

$day3 = new Day03(filePath: __DIR__ . '/inputs/day03/input.txt');
echo "Day 3 solution part one: " . $day3->partOne() . "\n";
echo "Day 3 solution part two: " . $day3->partTwo() . "\n";
