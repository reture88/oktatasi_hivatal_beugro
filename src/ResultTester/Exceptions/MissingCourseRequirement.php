<?php

declare(strict_types=1);

namespace src\ResultTester\Exceptions;

class MissingCourseRequirement extends \Exception
{
    public static function create(string $szak): self // paramétert megoldani
    {
        return new self(sprintf('A vizsga eredménye nem felel meg a szakkövetelménynek: %s',
            $szak
        ));
    }
}
