<?php

function load_classphp($directory) {
    if(is_dir($directory)) {
        $scan = scandir($directory);
        unset($scan[0], $scan[1]); //unset . and ..
        foreach($scan as $file) {
            if(is_dir($directory."/".$file)) {
                // load_classphp($directory."/".$file);
            } else {
                if(strpos($file, '.php') !== false) {
                    require_once($directory."/".$file);
                }
            }
        }
    }
    else
    {
        echo $directory. " is not a directory";
    }
}
require_once(dirname(__FILE__).'/../Models/Core/mysqlconnection.php');
load_classphp('../Models/Core');
load_classphp('../Models');

$q ="";
if($alertsManager->is_localhost())
    $q =".";