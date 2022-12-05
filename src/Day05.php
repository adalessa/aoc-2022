<?php

namespace App;

use Illuminate\Support\Collection;

class Day05
{
    public function __construct(
        private readonly string $filePath,
    ) {
    }

    public function partOne(): string
    {
        $chunks = $this->getFileLines()->chunkWhile(fn ($value) => $value !== "");
        $crates = $chunks->get(0);
        if (null === $crates) {
            throw new \Exception("Null creates");
        }
        $steps = $chunks->get(1)?->filter()->values();
        if (null === $steps) {
            throw new \Exception("Null steps");
        }

        $numbers = $crates->pop();

        assert(is_string($numbers));
        $splitted = str_split($numbers, 4);
        $totalRow = intval(array_pop($splitted));

        $map = array_fill(0, 3, []);

        $rows = $crates
            ->reverse()
            ->map(
                fn(string $row) =>
                    collect(str_split($row, 4))
                        ->map(fn(string $cell) => substr($cell, 1, 1))
                        ->filter(fn(string $value) => $value !== " ")
            )
        ;

        foreach ($rows as $row) {
            foreach ($row as $idx => $cell) {
                $map[$idx][] = $cell;
            }
        }


        $steps = $steps->map(
            fn(string $step) => new Step(...sscanf($step, "move %d from %d to %d"))
        );

        foreach ($steps as $step) {
            for ($i = 0; $i < $step->amount; $i++) {
                $val = array_pop($map[$step->from -1]);
                array_push($map[$step->to -1], $val);
            }
        }

        $result = "";
        foreach($map as $column) {
            $result .= array_pop($column);
        }


        return $result;
    }

    public function partTwo(): string
    {
        $chunks = $this->getFileLines()->chunkWhile(fn ($value) => $value !== "");
        $crates = $chunks->get(0);
        if (null === $crates) {
            throw new \Exception("Null creates");
        }
        $steps = $chunks->get(1)?->filter()->values();
        if (null === $steps) {
            throw new \Exception("Null steps");
        }

        $numbers = $crates->pop();

        assert(is_string($numbers));
        $splitted = str_split($numbers, 4);
        $totalRow = intval(array_pop($splitted));

        $map = array_fill(0, 3, []);

        $rows = $crates
            ->reverse()
            ->map(
                fn(string $row) =>
                    collect(str_split($row, 4))
                        ->map(fn(string $cell) => substr($cell, 1, 1))
                        ->filter(fn(string $value) => $value !== " ")
            )
        ;

        foreach ($rows as $row) {
            foreach ($row as $idx => $cell) {
                $map[$idx][] = $cell;
            }
        }


        $steps = $steps->map(
            fn(string $step) => new Step(...sscanf($step, "move %d from %d to %d"))
        );

        foreach ($steps as $step) {
            $vals = array_splice($map[$step->from -1], - $step->amount);
            $map[$step->to -1] = [...$map[$step->to -1], ...$vals];
        }

        $result = "";
        foreach($map as $column) {
            $result .= array_pop($column);
        }


        return $result;
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
        );
    }

}
