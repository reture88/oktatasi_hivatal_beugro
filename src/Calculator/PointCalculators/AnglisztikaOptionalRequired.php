<?php

declare(strict_types=1);

namespace src\Calculator\PointCalculators;

use src\Calculator\Interfaces\CourseTopicInterface;
use src\Objects\Collections\GlobalInputDataCollection;
use src\Objects\Enumeration\ErettsegiEredmenyek\Nev as ErettsegiEredmenyekTargy;

class AnglisztikaOptionalRequired implements CourseTopicInterface
{
    private $kotelezo_valaszthato_targy = [
        ErettsegiEredmenyekTargy::FRANCIA,
        ErettsegiEredmenyekTargy::NEMET,
        ErettsegiEredmenyekTargy::OLASZ,
        ErettsegiEredmenyekTargy::OROSZ,
        ErettsegiEredmenyekTargy::SPANYOL,
        ErettsegiEredmenyekTargy::TORTENELEM,
    ];

    public function getPoints(GlobalInputDataCollection $globalInputDataCollection): int
    {
        $result = 0;

        foreach ($globalInputDataCollection->getErettsegiEredmenyek()->getItems() as $eredmeny) {
            foreach ($this->kotelezo_valaszthato_targy as $targy) {
                if (
                    $eredmeny->getNev()->value === $targy->value
                    && ($result < (int) makeEnumValueFromString($eredmeny->getEredmeny()))
                ) {
                    $result = (int) makeEnumValueFromString($eredmeny->getEredmeny());
                }
            }
        }

        return $result;
    }
}
