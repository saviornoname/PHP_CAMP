<?php

function loadClass($className)
{
    $fileName = $_SERVER['DOCUMENT_ROOT']. '/'. strtolower($className) . '.php';
    $fileName = str_replace('\\', '/', $fileName);
    if (file_exists($fileName)) {
        $fileName = str_replace('\\', '/', $fileName);
        require_once ($fileName);
    }
    return false;
}

spl_autoload_register('loadClass');