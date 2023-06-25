<?php

declare(strict_types=1);

namespace src\Transformer;

use src\Objects\Collections\ErettsegiEredmenyekCollection;
use src\Objects\Collections\GlobalInputDataCollection;
use src\Objects\Collections\TobbletpontokCollection;
use src\Objects\ValueObjects\ValasztottSzakObject;
use src\Transformer\SubTransformers\ErettsegiEredmenyekTransformer;
use src\Transformer\SubTransformers\TobbletpontokTransformer;
use src\Transformer\SubTransformers\ValasztottSzakTransformer;

class MainDataTransformer
{
    public function createObjectFromArrayData(array $array): GlobalInputDataCollection
    {
        return new GlobalInputDataCollection(
            $this->createValasztottSzak($array),
            $this->createErettsegiEredmeny($array),
            $this->createTobbletpont($array)
        );
    }

    private function createValasztottSzak(array $array): ValasztottSzakObject
    {
        return (new ValasztottSzakTransformer())->transformData($array);
    }

    private function createErettsegiEredmeny(array $array): ErettsegiEredmenyekCollection
    {
        return (new ErettsegiEredmenyekTransformer())->transformData($array);
    }

    private function createTobbletpont(array $array): TobbletpontokCollection
    {
        return (new TobbletpontokTransformer())->transformData($array);
    }
}
