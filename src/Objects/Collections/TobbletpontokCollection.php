<?php

declare(strict_types=1);

namespace src\Objects\Collections;

use src\Objects\ValueObjects\TobbletpontokObject;

class TobbletpontokCollection extends GeneralCollection
{
    public function __construct(TobbletpontokObject ...$items)
    {
        $this->items = $items;
    }
}
