<?php

declare(strict_types=1);

namespace src\Validator\StructureAndValues\Rules;

use src\Objects\Enumeration\TobbletPontok\Kategoria;
use src\Objects\Enumeration\TobbletPontok\Tipus;
use src\Objects\Enumeration\TobbletPontok\TobbletpontokNyelv;
use src\Validator\Interfaces\BaseRulesInterface;
use src\Validator\StructureAndValues\Exceptions\StructureAndValuesRuleMissingKeyException;
use src\Validator\StructureAndValues\Exceptions\StructureAndValuesRuleNotValidValueUnderKeyException;

class TobbletPontokRule implements BaseRulesInterface
{
    public const NAME = 'tobbletpontok';
    private const KATEGORIA = 'kategoria';
    private const TIPUS = 'tipus';
    private const NYELV = 'nyelv';

    private $requiredFileds = [
        self::KATEGORIA => Kategoria::class,
        self::TIPUS => Tipus::class,
        self::NYELV => TobbletpontokNyelv::class,
    ];

    public function ruleValidate(array $array): void
    {
        foreach ($array as $node) {
            foreach ($this->requiredFileds as $enum_key => $enum_class) {
                if (false === \array_key_exists($enum_key, $node)) {
                    throw StructureAndValuesRuleMissingKeyException::create($enum_key);
                }

                if (null === ($enum_class)::tryFrom(makeEnumValueFromString($node[$enum_key]))) {
                    throw StructureAndValuesRuleNotValidValueUnderKeyException::create($enum_key, $node[$enum_key]);
                }
            }
        }
    }
}
