<?php

declare(strict_types=1);

namespace src\ResultTester\Requirements;

use src\Objects\Collections\GlobalInputDataCollection;
use src\Objects\Enumeration\ErettsegiEredmenyek\Nev as ErettsegiEredmenyekTargy;
use src\Objects\Enumeration\ErettsegiEredmenyek\Tipus;
use src\Objects\Enumeration\ValasztottSzak\Szak;
use src\ResultTester\Exceptions\MissingCourseRequirement;
use src\ResultTester\Interfaces\BaseRequirementInterface;

class Anglisztika implements BaseRequirementInterface
{
    private $name = Szak::ANGLISZTIKA;
    private $kotelezo_targy = ErettsegiEredmenyekTargy::ANGOL_NYELV;
    private $kotelezo_targy_szint = Tipus::EMELT;

    private $kotelezo_valaszthato_targy = [
        ErettsegiEredmenyekTargy::FRANCIA,
        ErettsegiEredmenyekTargy::NEMET,
        ErettsegiEredmenyekTargy::OLASZ,
        ErettsegiEredmenyekTargy::OROSZ,
        ErettsegiEredmenyekTargy::SPANYOL,
        ErettsegiEredmenyekTargy::TORTENELEM,
    ];

    public function testDataObject(GlobalInputDataCollection $globalInputDataCollection): void
    {
        $found_required = false;
        $found_required_optional = false;

        foreach ($globalInputDataCollection->getErettsegiEredmenyek()->getItems() as $eredmeny) {
            if (
                $eredmeny->getNev()->value === $this->kotelezo_targy->value
                && $eredmeny->getTipus()->value === $this->kotelezo_targy_szint->value
            ) {
                $found_required = true;
            }

            foreach ($this->kotelezo_valaszthato_targy as $targy) {
                if ($eredmeny->getNev()->value === $targy->value) {
                    $found_required_optional = true;
                }
            }
        }

        if (
            !$found_required
            || !$found_required_optional
        ) {
            throw MissingCourseRequirement::create($this->name->value);
        }
    }
}
