<?php

declare(strict_types=1);

namespace src\Transformer\SubTransformers;

use src\Objects\Collections\ErettsegiEredmenyekCollection;
use src\Objects\Enumeration\ErettsegiEredmenyek\Nev;
use src\Objects\Enumeration\ErettsegiEredmenyek\Tipus;
use src\Objects\ValueObjects\ErettsegiEredmenyekObject;
use src\Transformer\Interfaces\SubtransformerInterface;

class ErettsegiEredmenyekTransformer implements SubtransformerInterface
{
    private const ERETTSEGI_EREDMENYEK = 'erettsegi-eredmenyek';
    private const NEV = 'nev';
    private const TIPUS = 'tipus';
    private const EREDMENY = 'eredmeny';

    public function transformData(array $array): ErettsegiEredmenyekCollection
    {
        $eretsegi_eredmenyek_items = [];

        foreach ($array[self::ERETTSEGI_EREDMENYEK] as $eredmeny) {
            $eretsegi_eredmenyek_items[] = new ErettsegiEredmenyekObject(
                Nev::tryFrom(makeEnumValueFromString($eredmeny[self::NEV])),
                Tipus::tryFrom(makeEnumValueFromString($eredmeny[self::TIPUS])),
                $eredmeny[self::EREDMENY],
            );
        }

        return new ErettsegiEredmenyekCollection(...$eretsegi_eredmenyek_items);
    }
}
