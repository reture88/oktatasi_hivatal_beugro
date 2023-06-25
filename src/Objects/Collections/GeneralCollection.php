<?php

declare(strict_types=1);

namespace src\Objects\Collections;

class GeneralCollection
{
    protected array $items;

    public function getItems(): array
    {
        return $this->items;
    }
}
