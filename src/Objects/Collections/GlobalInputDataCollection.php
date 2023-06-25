<?php

declare(strict_types=1);

namespace src\Objects\Collections;

use src\Objects\ValueObjects\ValasztottSzakObject;

class GlobalInputDataCollection
{
    public function __construct(
        private ValasztottSzakObject $valasztottSzak,
        private ErettsegiEredmenyekCollection $erettsegiEredmenyek,
        private TobbletpontokCollection $tobbletpontok
    ) {
    }

    public function getValasztottSzak(): ValasztottSzakObject
    {
        return $this->valasztottSzak;
    }

    public function getErettsegiEredmenyek(): ErettsegiEredmenyekCollection
    {
        return $this->erettsegiEredmenyek;
    }

    public function getTobbletpontok(): TobbletpontokCollection
    {
        return $this->tobbletpontok;
    }
}
