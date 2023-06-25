<?php

declare(strict_types=1);

namespace src\Calculator\PointCalculatorHandlers;

use src\Calculator\PointCalculators\AnglisztikaOptionalRequired;
use src\Calculator\PointCalculators\AnglisztikaRequired;
use src\Calculator\PointCalculators\ProgramtervezoInformatikusOptionalRequired;
use src\Calculator\PointCalculators\ProgramtervezoInformatikusRequired;

class CourseSubjets
{
    public static array $handlers = [
        'PROGRAMTERVEZO_INFORMATIKUS' => [
            ProgramtervezoInformatikusRequired::class,
            ProgramtervezoInformatikusOptionalRequired::class,
        ],
        'ANGLISZTIKA' => [
            AnglisztikaRequired::class,
            AnglisztikaOptionalRequired::class,
        ],
    ];
}
