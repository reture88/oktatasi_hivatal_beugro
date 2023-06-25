<?php

declare(strict_types=1);

namespace src\Calculator\Interfaces;

use src\Objects\Collections\GlobalInputDataCollection;

interface CourseTopicInterface
{
    public function getPoints(GlobalInputDataCollection $globalInputDataCollection): int;
}
