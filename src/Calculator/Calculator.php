<?php

declare(strict_types=1);

namespace src\Calculator;

use src\Calculator\Exceptions\CourseTopicClassNotValidForInterfaceException;
use src\Calculator\Exceptions\ExtraClassNotValidForInterfaceException;
use src\Calculator\Interfaces\CourseTopicInterface;
use src\Calculator\PointCalculatorHandlers\CourseSubjets;
use src\Calculator\PointCalculatorHandlers\Extra;
use src\Objects\Collections\GlobalInputDataCollection;
use src\Objects\Enumeration\ValasztottSzak\Szak;

class Calculator
{
    private Szak $szak;
    private Int $maxExtraPontok = 100;

    private Int $osszPontszam = 0;

    public function __construct(
        private GlobalInputDataCollection $globalInputDataCollection
    ) {
        $this->initSzak();
    }

    private function initSzak(): void
    {
        $this->szak = $this->globalInputDataCollection->getValasztottSzak()->getSzak();
    }

    public function getOsszPontszam(): int
    {
        $this->checkSzakTargyClassInheritance();
        $this->checkExtraClassInheritance();

        $alapPontok = $this->getAlapPontok();

        $extraPontok = $this->getExtraPontok();
        $this->osszPontszam = $alapPontok + $extraPontok;

        return $this->osszPontszam;
    }

    private function getAlapPontok(): int
    {
        $points = 0;

        foreach (CourseSubjets::$handlers[$this->szak->value] as $szakTargy) {
            $points += (new $szakTargy())->getPoints($this->globalInputDataCollection);
        }

        return (int) $points * 2;
    }

    private function getExtraPontok(): int
    {
        $points = 0;

        foreach (Extra::$handlers as $extraClass) {
            $points += (new $extraClass())->getPoints($this->globalInputDataCollection);
        }

        return $points > $this->maxExtraPontok ? $this->maxExtraPontok : $points;
    }

    private function checkSzakTargyClassInheritance(): void
    {
        foreach (CourseSubjets::$handlers[$this->szak->value] as $szakTargy) {
            if (false === is_subclass_of($szakTargy, CourseTopicInterface::class)) {
                throw CourseTopicClassNotValidForInterfaceException::create($szakTargy);
            }
        }
    }

    private function checkExtraClassInheritance(): void
    {
        foreach (Extra::$handlers as $extra) {
            if (false === is_subclass_of($extra, CourseTopicInterface::class)) {
                throw ExtraClassNotValidForInterfaceException::create($extra);
            }
        }
    }
}
