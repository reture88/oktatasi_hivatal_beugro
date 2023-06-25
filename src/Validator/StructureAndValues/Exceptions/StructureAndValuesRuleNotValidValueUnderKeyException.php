<?php

declare(strict_types=1);

namespace src\Validator\StructureAndValues\Exceptions;

class StructureAndValuesRuleNotValidValueUnderKeyException extends \Exception
{
    public static function create(string $key, string $value): self
    {
        return new self(sprintf('Nem megfelelő érték a(z) %s alatt: %s',
            $key, $value
        ));
    }
}
