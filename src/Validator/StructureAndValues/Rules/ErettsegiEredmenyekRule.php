<?php

declare(strict_types=1);

namespace src\Validator\StructureAndValues\Rules;

use src\Objects\Enumeration\ErettsegiEredmenyek\Nev;
use src\Objects\Enumeration\ErettsegiEredmenyek\Tipus;
use src\Validator\Interfaces\BaseRulesInterface;
use src\Validator\StructureAndValues\Exceptions\StructureAndValuesRuleMissingKeyException;
use src\Validator\StructureAndValues\Exceptions\StructureAndValuesRuleNotValidValueUnderKeyException;

class ErettsegiEredmenyekRule implements BaseRulesInterface
{
    public const NAME = 'erettsegi-eredmenyek';
    private const NEV = 'nev';
    private const TIPUS = 'tipus';

    private $requiredFileds = [
        self::NEV => Nev::class,
        self::TIPUS => Tipus::class,
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
