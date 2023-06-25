<?php

declare(strict_types=1);

namespace src\ResultTester\Exceptions;

use src\ResultTester\Interfaces\BaseRequirementInterface;

class MissingBaseRequirementInterfaceException extends \Exception
{
    public static function create(string $class): self
    {
        return new self(sprintf('Hiba: %s nem implementálja a %s interfacet',
            $class, BaseRequirementInterface::class
        ));
    }
}
