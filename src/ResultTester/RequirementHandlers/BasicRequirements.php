<?php

declare(strict_types=1);

namespace src\ResultTester\RequirementHandlers;

use src\ResultTester\Requirements\BasicResultRequirements;
use src\ResultTester\Requirements\RequirementMin20Percent;

class BasicRequirements
{
    public static $requirements = [
        RequirementMin20Percent::class,
        BasicResultRequirements::class,
    ];
}
