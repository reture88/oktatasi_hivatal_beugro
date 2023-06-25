<?php

declare(strict_types=1);

namespace src\Validator\Interfaces;

interface BaseRulesInterface
{
    public function ruleValidate(array $array): void;
}
