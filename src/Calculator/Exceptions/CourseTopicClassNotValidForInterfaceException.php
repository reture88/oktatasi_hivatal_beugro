<?php

declare(strict_types=1);

namespace src\Calculator\Exceptions;

use src\Calculator\Interfaces\CourseTopicInterface;

class CourseTopicClassNotValidForInterfaceException extends \Exception
{
    public static function create(string $class): self
    {
        return new self(sprintf('Hiba: %s nem implementálja a %s interfacet',
            $class, CourseTopicInterface::class
        ));
    }
}
