<?php

/* use App\Day01; */
use App\Day02;

require("./vendor/autoload.php");

/* $dayOne = new Day01(filePath: __DIR__ . '/inputs/day01/01/input.txt'); */
/* echo "Day One solution part one: " . $dayOne->partOne(); */
/* echo "Day One solution part two: " . $dayOne->partTwo(); */

$dayTwo = new Day02(filePath: __DIR__ . '/inputs/day02/01/input.txt');
echo "Day two solution part one: " . $dayTwo->partOne();
echo "Day two solution part two: " . $dayTwo->partTwo();
