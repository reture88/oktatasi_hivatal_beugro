<?php

declare(strict_types=1);

namespace src\ResultTester\Requirements;

use src\Objects\Collections\GlobalInputDataCollection;
use src\Objects\Enumeration\ErettsegiEredmenyek\Nev as ErettsegiEredmenyekTargy;
use src\Objects\Enumeration\ValasztottSzak\Szak;
use src\ResultTester\Exceptions\MissingCourseRequirement;
use src\ResultTester\Interfaces\BaseRequirementInterface;

class ProgramtervezoInformatikus implements BaseRequirementInterface
{
    private $name = Szak::PROGRAMTERVEZO_INFORMATIKUS;
    private $kotelezo_targy = ErettsegiEredmenyekTargy::MATEMATIKA;

    private $kotelezo_valaszthato_targy = [
        ErettsegiEredmenyekTargy::BIOLOGIA,
        ErettsegiEredmenyekTargy::FIZIKA,
        ErettsegiEredmenyekTargy::INFORMATIKA,
        ErettsegiEredmenyekTargy::KEMIA,
    ];

    public function testDataObject(GlobalInputDataCollection $globalInputDataCollection): void
    {
        $found_required = false;
        $found_required_optional = false;

        foreach ($globalInputDataCollection->getErettsegiEredmenyek()->getItems() as $eredmeny) {
            if ($eredmeny->getNev()->value === $this->kotelezo_targy->value) {
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
