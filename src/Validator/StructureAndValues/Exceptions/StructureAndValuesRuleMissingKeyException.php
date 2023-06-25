<?php

declare(strict_types=1);

namespace src\Validator\StructureAndValues\Exceptions;

class StructureAndValuesRuleMissingKeyException extends \Exception
{
    public static function create(string $key): self
    {
        return new self(sprintf('Hiányzó kulcs: %s',
            $key
        ));
    }
}
