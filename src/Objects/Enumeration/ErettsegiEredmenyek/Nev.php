<?php

declare(strict_types=1);

namespace src\Objects\Enumeration\ErettsegiEredmenyek;

enum Nev: string
{
    case MAGYAR_NYELV_ES_IRODALOM = 'MAGYAR_NYELV_ES_IRODALOM';
    case TORTENELEM = 'TORTENELEM';
    case MATEMATIKA = 'MATEMATIKA';
    case ANGOL_NYELV = 'ANGOL_NYELV';
    case INFORMATIKA = 'INFORMATIKA';
    case FIZIKA = 'FIZIKA';
    case BIOLOGIA = 'BIOLOGIA';
    case KEMIA = 'KEMIA';
    case FRANCIA = 'FRANCIA_NYELV';
    case NEMET = 'NEMET_NYELV';
    case OLASZ = 'OLASZ_NYELV';
    case OROSZ = 'OROSZ_NYELV';
    case SPANYOL = 'SPANYOL_NYELV';
}
