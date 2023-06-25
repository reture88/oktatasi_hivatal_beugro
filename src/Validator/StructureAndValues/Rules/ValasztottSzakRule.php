<?php

declare(strict_types=1);

namespace src\Validator\StructureAndValues\Rules;

use src\Objects\Enumeration\ValasztottSzak\Egyetem;
use src\Objects\Enumeration\ValasztottSzak\Kar;
use src\Objects\Enumeration\ValasztottSzak\Szak;
use src\Validator\Interfaces\BaseRulesInterface;
use src\Validator\StructureAndValues\Exceptions\StructureAndValuesRuleMissingKeyException;
use src\Validator\StructureAndValues\Exceptions\StructureAndValuesRuleNotValidValueUnderKeyException;

class ValasztottSzakRule implements BaseRulesInterface
{
    public const NAME = 'valasztott-szak';
    private const EGYETEM = 'egyetem';
    private const KAR = 'kar';
    private const SZAK = 'szak';

    private $requiredFileds = [
        self::EGYETEM => Egyetem::class,
        self::KAR => Kar::class,
        self::SZAK => Szak::class,
    ];

    public function ruleValidate(array $array): void
    {
        foreach ($this->requiredFileds as $enum_key => $enum_class) {
            if (false === \array_key_exists($enum_key, $array)) {
                throw StructureAndValuesRuleMissingKeyException::create($enum_key);
            }

            if (null === ($enum_class)::tryFrom(makeEnumValueFromString($array[$enum_key]))) {
                throw StructureAndValuesRuleNotValidValueUnderKeyException::create($enum_key, $array[$enum_key]);
            }
        }
    }
}
