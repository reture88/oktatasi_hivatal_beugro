<?php

declare(strict_types=1);

namespace src\Validator\Exceptions;

use src\Validator\Interfaces\BaseValidatorInterface;

class MissingBaseValidatorInterfaceException extends GenericValidatorException
{
    public static function create(string $class): self
    {
        return new self(sprintf('Hiba: a(z) %s nem implementálja a %s interfacet',
            $class, BaseValidatorInterface::class
        ));
    }
}
