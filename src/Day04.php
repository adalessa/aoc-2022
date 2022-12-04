<?php

namespace App;

use Illuminate\Support\Collection;

class Day04
{
    public function __construct(
        private readonly string $filePath,
    ) {
    }

    public function partOne(): int
    {
        return $this->getFileLines()
            ->map(static function (string $item): CleanPair {
                [$zone1, $zone2] = explode(string: $item, separator: ",");

                return new CleanPair(
                    new Zone(...collect(explode(string: $zone1, separator: "-"))->map(fn (string $val) => intval($val))->values()),
                    new Zone(...collect(explode(string: $zone2, separator: "-"))->map(fn (string $val) => intval($val))->values()),
                );
            })
            ->filter(static function (CleanPair $zones) {
                return ($zones->zone1->start <= $zones->zone2->start && $zones->zone1->end >= $zones->zone2->end)
                    || ($zones->zone2->start <= $zones->zone1->start && $zones->zone2->end >= $zones->zone1->end);
            })
            ->count()
        ;
    }

    public function partTwo(): int
    {
        return $this->getFileLines()
            ->map(static function (string $item): CleanPair {
                [$zone1, $zone2] = explode(string: $item, separator: ",");

                return new CleanPair(
                    new Zone(...collect(explode(string: $zone1, separator: "-"))->map(fn (string $val) => intval($val))->values()),
                    new Zone(...collect(explode(string: $zone2, separator: "-"))->map(fn (string $val) => intval($val))->values()),
                );
            })
            ->filter(static function (CleanPair $zones) {
                return ($zones->zone1->end >= $zones->zone2->start && $zones->zone1->start <= $zones->zone2->start)
                    || ($zones->zone2->end >= $zones->zone1->start && $zones->zone2->start <= $zones->zone1->start)
                ;
            })
            ->count()
        ;
    }

    /**
     * @return Collection<int, string>
     */
    public function getFileLines(): Collection
    {
        $fileContent = file_get_contents($this->filePath);
        if (false === $fileContent) {
            throw new \Exception("No content on the file");
        }

        return collect(
            explode(string: $fileContent, separator: "\n")
        )->filter();
    }
}
