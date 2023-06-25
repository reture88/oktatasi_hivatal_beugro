<?php

declare(strict_types=1);

namespace src\ResultTester\Exceptions;

class FailedRequirementMin20Percent extends \Exception
{
    public static function create(string $targy): self
    {
        return new self(sprintf('Hiba: Nem felelt meg az alábbi tárgyból: %s',
            $targy
        ));
    }
}
