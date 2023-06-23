<?php

declare(strict_types=1);

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
ini_set('log_errors', 'On');
ini_set('html_errors', 'On');
error_reporting(\E_ALL & ~\E_NOTICE & ~\E_DEPRECATED & ~\E_WARNING);

require __DIR__ . '/../vendor/autoload.php';

$examplesPath =__DIR__."/examples";

foreach(scandir($examplesPath) as $exampleFile){
    if( !is_dir($exampleFile) ){
        $exampleFileContent = require_once $examplesPath."/".$exampleFile;
        
        


    }
}





dd("end");
?>