<?php

declare(strict_types=1);

namespace src\Validator\StructureAndValues;

use src\Validator\Interfaces\BaseRulesInterface;
use src\Validator\Interfaces\BaseValidatorInterface;
use src\Validator\StructureAndValues\Exceptions\StructureAndValuesValidatorMissingBaseRulesException;
use src\Validator\StructureAndValues\Exceptions\StructureAndValuesValidatorMissingDataKeyException;
use src\Validator\StructureAndValues\Rules\ErettsegiEredmenyekRule;
use src\Validator\StructureAndValues\Rules\IssetEredmenyRule;
use src\Validator\StructureAndValues\Rules\TobbletPontokRule;
use src\Validator\StructureAndValues\Rules\ValasztottSzakRule;

class StructureAndValues implements BaseValidatorInterface
{
    private $rules = [
        ValasztottSzakRule::NAME => ValasztottSzakRule::class,
        TobbletPontokRule::NAME => TobbletPontokRule::class,
        ErettsegiEredmenyekRule::NAME => ErettsegiEredmenyekRule::class,
        IssetEredmenyRule::KEY_4_SEARC => IssetEredmenyRule::class,
    ];

    public function validate(array $array): void
    {
        $this->checkRequiredRules($array);
        $this->checkRuleInheritance($array);

        foreach ($this->rules as $rule_key => $rule_class) {
            $rule = new $this->rules[$rule_key]();
            $rule->ruleValidate($array[$rule_key]);
        }
    }

    private function checkRequiredRules(array $array): void
    {
        foreach ($this->rules as $rule_key => $rule_class) {
            if (false === \array_key_exists($rule_key, $array)) {
                throw StructureAndValuesValidatorMissingDataKeyException::create($rule_key);
            }
        }
    }

    private function checkRuleInheritance(array $array): void
    {
        foreach ($this->rules as $rule_key => $rule_class) {
            $rule = new $this->rules[$rule_key]();

            if (false === is_subclass_of($rule, BaseRulesInterface::class)) {
                throw StructureAndValuesValidatorMissingBaseRulesException::create($rule_key);
            }
        }
    }
}
