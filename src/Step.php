<?php

declare(strict_types=1);

namespace App;

class Step
{
    public function __construct(
        public readonly ?int $amount,
        public readonly ?int $from,
        public readonly ?int $to,
    ) {
    }
}
