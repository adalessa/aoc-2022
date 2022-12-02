<?php

declare(strict_types=1);

namespace App;

use Exception;

class Day01
{
    public function __construct(
        private readonly string $filePath,
    ) {
    }

    public function partOne(): int
    {
        $calories = $this->getTotalCalories();
        $mostCalories = array_pop($calories);
        if (!is_int($mostCalories)) {
            throw new Exception("Wrong key returned");
        }

        return $mostCalories;
    }

    public function partTwo(): int
    {
        $calories = $this->getTotalCalories();

        $top1 = array_pop($calories);
        $top2 = array_pop($calories);
        $top3 = array_pop($calories);

        return $top1 + $top2 + $top3;
    }

    /**
     * @return array<int, int>
     */
    private function getTotalCalories(): array
    {
        $fileContent = file_get_contents($this->filePath);
        if (false === $fileContent) {
            throw new Exception("No content on the file");
        }

        $lines = explode(string: $fileContent, separator: "\n");

        $elfs = [];
        $calories = 0;
        foreach ($lines as $line) {
            if (empty($line)) {
                if ($calories !== 0) {
                    $elfs[] = $calories;
                }
                $calories = 0;
            }

            $calories += intval($line);
        }

        asort($elfs);

        return $elfs;
    }
}
