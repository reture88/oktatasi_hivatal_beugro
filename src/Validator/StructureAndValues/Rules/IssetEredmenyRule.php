<?php

declare(strict_types=1);

namespace src\Validator\StructureAndValues\Rules;

use src\Validator\Interfaces\BaseRulesInterface;
use src\Validator\StructureAndValues\Exceptions\StructureAndValuesRuleMissingKeyException;

class IssetEredmenyRule implements BaseRulesInterface
{
    public const KEY_4_SEARC = 'erettsegi-eredmenyek';
    private const EREDMENY = 'eredmeny';

    private $requiredFileds = [
        self::EREDMENY,
    ];

    public function ruleValidate(array $array): void
    {
        foreach ($array as $node) {
            foreach ($this->requiredFileds as $required_key) {
                if (false === \array_key_exists($required_key, $node)) {
                    throw StructureAndValuesRuleMissingKeyException::create($required_key);
                }
            }
        }
    }
}
