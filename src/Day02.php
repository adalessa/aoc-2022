<?php

declare(strict_types=1);

namespace App;

class Day02
{
    private const WIN_MAP = [
        "A X" => 4,
        "A Y" => 8,
        "A Z" => 3,
        "B X" => 1,
        "B Y" => 5,
        "B Z" => 9,
        "C X" => 7,
        "C Y" => 2,
        "C Z" => 6,
    ];

    private const PLAY_MAP = [
        "A X" => "A Z",
        "A Y" => "A X",
        "A Z" => "A Y",
        "B X" => "B X",
        "B Y" => "B Y",
        "B Z" => "B Z",
        "C X" => "C Y",
        "C Y" => "C Z",
        "C Z" => "C X",
    ];

    public function __construct(
        private readonly string $filePath,
    ) {
    }

    public function partOne(): int
    {
        return array_reduce(
            array: $this->getFileLines(),
            callback: fn(int $carry, string $item) => $carry + self::WIN_MAP[$item],
            initial: 0,
        );
    }

    public function partTwo(): int
    {
        return array_reduce(
            array: $this->getFileLines(),
            callback: fn(int $carry, string $item) => $carry + self::WIN_MAP[self::PLAY_MAP[$item]],
            initial: 0,
        );
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
