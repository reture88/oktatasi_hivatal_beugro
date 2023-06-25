<?php

declare(strict_types=1);

namespace src\ResultTester\Interfaces;

use src\Objects\Collections\GlobalInputDataCollection;

interface BaseRequirementInterface
{
    public function testDataObject(GlobalInputDataCollection $globalInputDataCollection): void;
}
