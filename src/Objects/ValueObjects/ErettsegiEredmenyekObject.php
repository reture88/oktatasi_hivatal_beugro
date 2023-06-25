<?php

declare(strict_types=1);

namespace src\Objects\ValueObjects;

use src\Objects\Enumeration\ErettsegiEredmenyek\Nev;
use src\Objects\Enumeration\ErettsegiEredmenyek\Tipus;

final class ErettsegiEredmenyekObject
{
    public function __construct(
        private Nev $nev,
        private Tipus $tipus,
        private string $eredmeny
    ) {
    }

    public function getNev(): Nev
    {
        return $this->nev;
    }

    public function getTipus(): Tipus
    {
        return $this->tipus;
    }

    public function getEredmeny(): string
    {
        return $this->eredmeny;
    }
}
