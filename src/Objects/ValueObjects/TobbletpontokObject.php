<?php

declare(strict_types=1);

namespace src\Objects\ValueObjects;

use src\Objects\Enumeration\TobbletPontok\Kategoria;
use src\Objects\Enumeration\TobbletPontok\Tipus;
use src\Objects\Enumeration\TobbletPontok\TobbletpontokNyelv;

class TobbletpontokObject
{
    public function __construct(
        private Kategoria $kategoria,
        private Tipus $tipus,
        private TobbletpontokNyelv $nyelv
    ) {
    }

    public function getKategoria(): Kategoria
    {
        return $this->kategoria;
    }

    public function getNyelv(): TobbletpontokNyelv
    {
        return $this->nyelv;
    }

    public function getTipus(): Tipus
    {
        return $this->tipus;
    }
}
