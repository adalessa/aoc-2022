<?php

declare(strict_types=1);

namespace App;

use Exception;

class Day03
{
    private const letters = 'abcdefghijklmnopqrstuvwxyz';

    public function __construct(
        private readonly string $filePath,
    ) {
    }

    public function partOne(): int
    {
        $lines = $this->getFileLines();
        $duplicates = array_map(
            array: $lines,
            callback: static function (string $line) {
                $halfPoint = intval(strlen($line) / 2);
                if ($halfPoint < 1) {
                    throw new Exception("can not split with less than one");
                }
                $splits = str_split($line, $halfPoint);
                $first = str_split($splits[0]);
                $second = str_split($splits[1]);

                return array_intersect($first, $second);
            }
        );

        return array_reduce(
            initial: 0,
            array: $duplicates,
            callback: function (int $carry, array $duplicate) {
                $letter = reset($duplicate);
                if (false === $letter) {
                    throw new Exception("Could get first element");
                }
                return $carry + $this->getPriority($letter);
            },
        );
    }

    public function partTwo(): int
    {
        $lines = $this->getFileLines();

        return array_reduce(
            initial: 0,
            callback: fn (int $carry, string $letter): int => $carry + $this->getPriority($letter),
            array: array_map(
                array: array_chunk(
                    array: $lines,
                    length: 3,
                ),
                callback: function(array $bags): string {
                    $arrBags = array_map(
                        array: $bags,
                        callback: static fn (string $bag): array => str_split($bag),
                    );
                    $dups = array_intersect(...$arrBags);
                    $letter = reset($dups);
                    if (false === $letter) {
                        throw new Exception("Could get first element");
                    }
                    return $letter;
                }
            ),
        );
    }

    private function getPriority(string $letter): int
    {
        $lowercase = str_split(self::letters);
        $uppercase = str_split(strtoupper(self::letters));

        $key = array_search($letter, $lowercase);
        if (is_int($key)) {
            return $key + 1;
        }

        $key = array_search($letter, $uppercase);
        if (is_int($key)) {
            return $key + 27;
        }

        throw new Exception("Could not find priority for: " . $letter);
    }

    /**
     * @return string[]
     */
    public function getFileLines(): array
    {
        $fileContent = file_get_contents($this->filePath);
        if (false === $fileContent) {
            throw new \Exception("No content on the file");
        }

        return array_filter(explode(string: $fileContent, separator: "\n"));
    }
}
