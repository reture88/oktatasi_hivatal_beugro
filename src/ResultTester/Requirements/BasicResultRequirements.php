<?php

declare(strict_types=1);

namespace src\ResultTester\Requirements;

use src\Objects\Collections\GlobalInputDataCollection;
use src\Objects\Enumeration\ResultTester\BasicTargyRequirements;
use src\ResultTester\Exceptions\BasicResultMissingException;
use src\ResultTester\Interfaces\BaseRequirementInterface;

class BasicResultRequirements implements BaseRequirementInterface
{
    public function testDataObject(GlobalInputDataCollection $globalInputDataCollection): void
    {
        $requireds = array_column(BasicTargyRequirements::cases(), 'value');
        $found_required = [];

        foreach ($globalInputDataCollection->getErettsegiEredmenyek()->getItems() as $eredmeny) {
            if (\in_array($eredmeny->getNev()->value, $requireds, true)) {
                $found_required[] = $eredmeny->getNev()->value;
            }
        }

        if (\count($found_required) !== \count($requireds)) {
            throw BasicResultMissingException::create(array_diff($requireds, $found_required));
        }
    }
}
