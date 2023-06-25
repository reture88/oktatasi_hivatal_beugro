<?php

declare(strict_types=1);

namespace src\Calculator\PointCalculators;

use src\Calculator\Interfaces\CourseTopicInterface;
use src\Objects\Collections\GlobalInputDataCollection;
use src\Objects\Enumeration\ErettsegiEredmenyek\Tipus;

class PointsByAdvancedExam implements CourseTopicInterface
{
    private $needField = Tipus::EMELT;
    private $points4neededField = 50;

    public function getPoints(GlobalInputDataCollection $globalInputDataCollection): int
    {
        $result = 0;

        foreach ($globalInputDataCollection->getErettsegiEredmenyek()->getItems() as $eredmeny) {
            if ($eredmeny->getTipus()->value === $this->needField->value) {
                $result += $this->points4neededField;
            }
        }

        return $result;
    }
}
