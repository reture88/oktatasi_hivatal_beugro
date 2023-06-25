<?php

declare(strict_types=1);

namespace src\Validator\StructureAndValues\Exceptions;

class StructureAndValuesValidatorMissingDataKeyException extends \Exception
{
    public static function create(string $key): self
    {
        return new self(sprintf('Hiba, a kapott adatok nem tartalmazzák az alábbi szükséges adatot: %s',
            $key
        ));
    }
}
