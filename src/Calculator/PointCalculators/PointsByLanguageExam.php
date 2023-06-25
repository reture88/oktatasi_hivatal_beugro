<?php

declare(strict_types=1);

namespace src\Calculator\PointCalculators;

use src\Calculator\Interfaces\CourseTopicInterface;
use src\Objects\Collections\GlobalInputDataCollection;

class PointsByLanguageExam implements CourseTopicInterface
{
    private $pontokTipusSzerint = [
        'B2' => 28,
        'C1' => 40,
    ];

    public function getPoints(GlobalInputDataCollection $globalInputDataCollection): int
    {
        $result = [];

        foreach ($globalInputDataCollection->getTobbletpontok()->getItems() as $eredmeny) {
            if (
                !isset($result[$eredmeny->getNyelv()->value])
                || $result[$eredmeny->getNyelv()->value] < $this->pontokTipusSzerint[$eredmeny->getTipus()->value]
            ) {
                $result[$eredmeny->getNyelv()->value] = $this->pontokTipusSzerint[$eredmeny->getTipus()->value];
            }
        }

        return (int) array_sum($result);
    }
}
