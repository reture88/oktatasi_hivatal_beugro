<?php

declare(strict_types=1);

namespace src\Validator;

use src\Validator\Exceptions\MissingBaseValidatorInterfaceException;
use src\Validator\Interfaces\BaseValidatorInterface;
use src\Validator\StructureAndValues\StructureAndValues;

class MainInputDataValidator
{
    protected array $validators = [
        StructureAndValues::class,
        /* késöbbi egyéb validátorok ha kellenének ide mehetnek */
    ];

    public function validateInputData(array $array): void
    {
        $this->validateValidators();
        $this->runValidators($array);
    }

    private function validateValidators(): void
    {
        foreach ($this->validators as $validatorClass) {
            $validator = new $validatorClass();

            if (false === is_subclass_of($validator, BaseValidatorInterface::class)) {
                throw MissingBaseValidatorInterfaceException::create($validatorClass);
            }
        }
    }

    private function runValidators(array $array): void
    {
        foreach ($this->validators as $validator) {
            (new $validator())->validate($array);
        }
    }
}
