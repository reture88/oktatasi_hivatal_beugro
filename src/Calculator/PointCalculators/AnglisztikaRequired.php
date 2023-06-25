<?php

declare(strict_types=1);

namespace src\Calculator\PointCalculators;

use src\Calculator\Interfaces\CourseTopicInterface;
use src\Objects\Collections\GlobalInputDataCollection;
use src\Objects\Enumeration\ErettsegiEredmenyek\Nev as ErettsegiEredmenyekTargy;
use src\Objects\Enumeration\ErettsegiEredmenyek\Tipus;

class AnglisztikaRequired implements CourseTopicInterface
{
    private $kotelezo_targy = ErettsegiEredmenyekTargy::ANGOL_NYELV;
    private $kotelezo_targy_szint = Tipus::EMELT;

    public function getPoints(GlobalInputDataCollection $globalInputDataCollection): int
    {
        $result = 0;

        foreach ($globalInputDataCollection->getErettsegiEredmenyek()->getItems() as $eredmeny) {
            if (
                $eredmeny->getNev()->value === $this->kotelezo_targy->value
                && $eredmeny->getTipus()->value === $this->kotelezo_targy_szint->value
            ) {
                $result = (int) makeEnumValueFromString($eredmeny->getEredmeny());
            }
        }

        return $result;
    }
}
