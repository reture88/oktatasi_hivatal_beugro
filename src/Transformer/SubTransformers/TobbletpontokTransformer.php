<?php

declare(strict_types=1);

namespace src\Transformer\SubTransformers;

use src\Objects\Collections\TobbletpontokCollection;
use src\Objects\Enumeration\TobbletPontok\Kategoria;
use src\Objects\Enumeration\TobbletPontok\Tipus as TobbletpontTipus;
use src\Objects\Enumeration\TobbletPontok\TobbletpontokNyelv;
use src\Objects\ValueObjects\TobbletpontokObject;
use src\Transformer\Interfaces\SubtransformerInterface;

class TobbletpontokTransformer implements SubtransformerInterface
{
    private const TOBBLETPONTOK = 'tobbletpontok';

    private const TIPUS = 'tipus';

    private const KATEGORIA = 'kategoria';
    private const NYELV = 'nyelv';

    public function transformData(array $array): TobbletpontokCollection
    {
        $tobbletpontok_items = [];

        foreach ($array[self::TOBBLETPONTOK] as $tobbletpont) {
            $tobbletpontok_items[] = new TobbletpontokObject(
                Kategoria::tryFrom(makeEnumValueFromString($tobbletpont[self::KATEGORIA])),
                TobbletpontTipus::tryFrom(makeEnumValueFromString($tobbletpont[self::TIPUS])),
                TobbletpontokNyelv::tryFrom(makeEnumValueFromString($tobbletpont[self::NYELV])),
            );
        }

        return new TobbletpontokCollection(...$tobbletpontok_items);
    }
}
