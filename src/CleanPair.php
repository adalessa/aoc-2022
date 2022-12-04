<?php

namespace App;

class CleanPair
{
    public function __construct(
        public readonly Zone $zone1,
        public readonly Zone $zone2,
    ) {
    }
}
