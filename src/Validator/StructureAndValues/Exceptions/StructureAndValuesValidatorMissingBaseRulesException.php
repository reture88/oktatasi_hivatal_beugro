<?php

declare(strict_types=1);

namespace src\Validator\StructureAndValues\Exceptions;

use src\Validator\Interfaces\BaseRulesInterface;

class StructureAndValuesValidatorMissingBaseRulesException extends \Exception
{
    public static function create(string $class): self
    {
        return new self(sprintf('Hiba: a(z) %s nem implementálja a %s interfacet',
            $class, BaseRulesInterface::class
        ));
    }
}
