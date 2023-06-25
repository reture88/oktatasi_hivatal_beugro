<?php

declare(strict_types=1);

namespace src\ResultTester\Exceptions;

class BasicResultMissingException extends \Exception
{
    public static function create(array $missing_eredmenyek): self
    {
        return new self(sprintf('Hiba: Nem tett az alábbi kötelező tárgy(ak)ból vizsgát: %s',
            implode(', ', $missing_eredmenyek)
        ));
    }
}
