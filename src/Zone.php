<?php

namespace App;

class Zone
{
    public function __construct(
        public readonly int $start,
        public readonly int $end,
    ) {
    }
}
