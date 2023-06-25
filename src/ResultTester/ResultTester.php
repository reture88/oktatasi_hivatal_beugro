<?php

declare(strict_types=1);

namespace src\ResultTester;

use src\Objects\Collections\GlobalInputDataCollection;
use src\Objects\Enumeration\ValasztottSzak\Szak;
use src\ResultTester\Exceptions\MissingBaseRequirementInterfaceException;
use src\ResultTester\Interfaces\BaseRequirementInterface;
use src\ResultTester\RequirementHandlers\BasicRequirements;
use src\ResultTester\RequirementHandlers\CourseRequirements;

class ResultTester
{
    private Szak $szak;

    public function __construct(
        private GlobalInputDataCollection $globalInputDataCollection
    ) {
        $this->initSzak();
    }

    public function testRequirements(): void
    {
        self::checkRequirementsInheritance();

        foreach (BasicRequirements::$requirements as $requirement_class) {
            (new $requirement_class())->testDataObject($this->globalInputDataCollection);
        }

        foreach (CourseRequirements::$requirements[$this->getSzak()->value] as $requirement_class) {
            (new $requirement_class())->testDataObject($this->globalInputDataCollection);
        }
    }

    public function getSzak(): Szak
    {
        return $this->szak;
    }

    private function initSzak(): void
    {
        $this->szak = $this->globalInputDataCollection->getValasztottSzak()->getSzak();
    }

    private function checkRequirementsInheritance(): void
    {
        foreach (BasicRequirements::$requirements as $requirement_class) {
            $requirement = new $requirement_class();

            if (false === is_subclass_of($requirement, BaseRequirementInterface::class)) {
                throw MissingBaseRequirementInterfaceException::create($requirement_class);
            }
        }

        foreach (CourseRequirements::$requirements[$this->getSzak()->value] as $requirement_class) {
            $requirement = new $requirement_class();

            if (false === is_subclass_of($requirement, BaseRequirementInterface::class)) {
                throw MissingBaseRequirementInterfaceException::create($requirement_class);
            }
        }
    }
}
