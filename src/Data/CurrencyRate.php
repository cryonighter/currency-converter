<?php

namespace Cryonighter\CurrencyConverter\Data;

class CurrencyRate
{
    public function __construct(
        public readonly float $value,
        public readonly int $nominal,
        public readonly string $charCode,
        public readonly string $numCode,
        public readonly string $name,
    ) {
    }
}
