<?php

declare(strict_types=1);

namespace src\Objects\Collections;

use src\Objects\ValueObjects\ErettsegiEredmenyekObject;

class ErettsegiEredmenyekCollection extends GeneralCollection
{
    public function __construct(ErettsegiEredmenyekObject ...$items)
    {
        $this->items = $items;
    }
}
