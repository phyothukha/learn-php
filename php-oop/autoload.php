<?php

function myAutoloader($className)
{
    $classPath = __DIR__ . "/classes/" . str_replace("\\", "/", $className) . '.php';

    if (file_exists($classPath)) {
        require_once $classPath;
    } else {
        echo "File Not Found";
    }
}

spl_autoload_register('myAutoloader');
