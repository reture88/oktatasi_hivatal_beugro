<?php

declare(strict_types=1);

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
ini_set('log_errors', 'On');
ini_set('html_errors', 'On');
error_reporting(\E_ALL & ~\E_NOTICE & ~\E_DEPRECATED & ~\E_WARNING);

require __DIR__ . '/../vendor/autoload.php';

use src\Validator\MainInputDataValidator;
use src\Transformer\MainDataTransformer;
use src\ResultTester\ResultTester;
use src\Calculator\Calculator;

$examplesPath =__DIR__."/examples";

foreach(scandir($examplesPath) as $exampleFile){
    if( !is_dir($exampleFile) ){
        $exampleFileContent = require_once $examplesPath."/".$exampleFile;
        
        try {
            // Bemeneti adat struktura validálása
            (new MainInputDataValidator)->validateInputData($exampleFileContent);

            // Bemeneti adat Objektummá alakítása
            $inputDataObject = (new MainDataTransformer)->createObjectFromArrayData($exampleFileContent);
      
            // Érettségi eredmények tesztlése - pontszámítás lehetséges/nem lehetséges
            (new ResultTester($inputDataObject))->testRequirements();
        
            // Pontszám kalkulálás
            d((new Calculator($inputDataObject))->getOsszPontszam());

        } catch (\Exception $e) {
            d($e->getMessage());
        }
    }
}

?>