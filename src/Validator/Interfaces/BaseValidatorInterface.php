<?php

declare(strict_types=1);

namespace src\Validator\Interfaces;

interface BaseValidatorInterface
{
    public function validate(array $array): void;
}
