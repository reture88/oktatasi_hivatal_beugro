<?php

declare(strict_types=1);

namespace src\Transformer\SubTransformers;

use src\Objects\Enumeration\ValasztottSzak\Egyetem;
use src\Objects\Enumeration\ValasztottSzak\Kar;
use src\Objects\Enumeration\ValasztottSzak\Szak;
use src\Objects\ValueObjects\ValasztottSzakObject;
use src\Transformer\Interfaces\SubtransformerInterface;

class ValasztottSzakTransformer implements SubtransformerInterface
{
    private const VALASZTOTT_SZAK = 'valasztott-szak';
    private const EGYETEM = 'egyetem';
    private const KAR = 'kar';
    private const SZAK = 'szak';

    public function transformData(array $array): ValasztottSzakObject
    {
        return new ValasztottSzakObject(
            Egyetem::tryFrom(makeEnumValueFromString($array[self::VALASZTOTT_SZAK][self::EGYETEM])),
            Kar::tryFrom(makeEnumValueFromString($array[self::VALASZTOTT_SZAK][self::KAR])),
            Szak::tryFrom(makeEnumValueFromString($array[self::VALASZTOTT_SZAK][self::SZAK])),
        );
    }
}
