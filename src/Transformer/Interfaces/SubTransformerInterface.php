<?php

declare(strict_types=1);

namespace src\Transformer\Interfaces;

interface SubTransformerInterface
{
    public function transformData(array $array);
}
