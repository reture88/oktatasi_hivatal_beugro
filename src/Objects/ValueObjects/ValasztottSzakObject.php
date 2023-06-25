<?php

declare(strict_types=1);

namespace src\Objects\ValueObjects;

use src\Objects\Enumeration\ValasztottSzak\Egyetem;
use src\Objects\Enumeration\ValasztottSzak\Kar;
use src\Objects\Enumeration\ValasztottSzak\Szak;

class ValasztottSzakObject
{
    public function __construct(
        private Egyetem $egyetem,
        private Kar $kar,
        private Szak $szak
    ) {
    }

    public function getEgyetem(): Egyetem
    {
        return $this->egyetem;
    }

    public function getKar(): Kar
    {
        return $this->kar;
    }

    public function getSzak(): Szak
    {
        return $this->szak;
    }
}
