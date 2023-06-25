<?php

declare(strict_types=1);

namespace src\Calculator\PointCalculatorHandlers;

use src\Calculator\PointCalculators\PointsByAdvancedExam;
use src\Calculator\PointCalculators\PointsByLanguageExam;

class Extra
{
    public static array $handlers = [
        PointsByAdvancedExam::class,
        PointsByLanguageExam::class,
    ];
}
