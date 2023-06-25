<?php

declare(strict_types=1);

namespace src\ResultTester\RequirementHandlers;

use src\ResultTester\Requirements\Anglisztika;
use src\ResultTester\Requirements\ProgramtervezoInformatikus;

class CourseRequirements
{
    private const PROGRAMTERVEZO_INFORMATIKUS = 'PROGRAMTERVEZO_INFORMATIKUS';
    private const ANGLISZTIKA = 'ANGLISZTIKA';

    public static $requirements = [
        self::PROGRAMTERVEZO_INFORMATIKUS => [
            ProgramtervezoInformatikus::class,
        ],
        self::ANGLISZTIKA => [
            Anglisztika::class,
        ],
    ];
}
