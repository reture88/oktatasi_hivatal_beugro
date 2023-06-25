<?php

declare(strict_types=1);

namespace src\ResultTester\Requirements;

use src\Objects\Collections\GlobalInputDataCollection;
use src\ResultTester\Exceptions\FailedRequirementMin20Percent;
use src\ResultTester\Interfaces\BaseRequirementInterface;

class RequirementMin20Percent implements BaseRequirementInterface
{
    private $minpercent = 20;

    public function testDataObject(GlobalInputDataCollection $globalInputDataCollection): void
    {
        foreach ($globalInputDataCollection->getErettsegiEredmenyek()->getItems() as $eredmeny) {
            if ((int) $eredmeny->getEredmeny() < $this->minpercent) {
                throw FailedRequirementMin20Percent::create($eredmeny->getNev()->value);
            }
        }
    }
}
