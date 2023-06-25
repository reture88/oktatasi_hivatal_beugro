<?php

declare(strict_types=1);

namespace src\Calculator\PointCalculators;

use src\Calculator\Interfaces\CourseTopicInterface;
use src\Objects\Collections\GlobalInputDataCollection;
use src\Objects\Enumeration\ErettsegiEredmenyek\Nev as ErettsegiEredmenyekTargy;

class ProgramtervezoInformatikusRequired implements CourseTopicInterface
{
    private $kotelezo_targy = ErettsegiEredmenyekTargy::MATEMATIKA;

    public function getPoints(GlobalInputDataCollection $globalInputDataCollection): int
    {
        $result = 0;

        foreach ($globalInputDataCollection->getErettsegiEredmenyek()->getItems() as $eredmeny) {
            if ($eredmeny->getNev()->value === $this->kotelezo_targy->value) {
                $result = (int) makeEnumValueFromString($eredmeny->getEredmeny());
            }
        }

        return $result;
    }
}
