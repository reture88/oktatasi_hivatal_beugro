<?php

declare(strict_types=1);
function d($var): void
{
    echo '<pre style="font-family:monospace; font-size:11px; padding:10px;">';
    var_dump($var);
    echo '</pre>';
}
function dd($var): void
{
    echo '<pre style="font-family:monospace; font-size:11px; padding:10px;">';
    var_dump($var);
    echo '</pre>';
    exit;
}

function makeEnumValueFromString(string $input): string
{
    $Str1 = ['Ú', 'ú', 'á', 'é', 'í', 'ü', 'ö', 'ű', 'ó', 'ő', 'Á', 'É', 'Í', 'Ü', 'Ű', 'Ó', 'Ö', 'Ő', ' '];
    $Str2 = ['U', 'u', 'a', 'e', 'i', 'u', 'o', 'u', 'o', 'o', 'A', 'E', 'I', 'U', 'U', 'O', 'O', 'O', '_'];
    $tmp = str_replace($Str1, $Str2, $input);

    return strtoupper($tmp);
}

function makeEnumValueFromPercent(string $input): string
{
    $tmp = makeEnumValueFromString($input);

    return str_replace('%', '', $tmp);
}
