<?php

class Rock_Core_AutoLoad
{

    public static function loadClass($className)
    {
        $file = dirname(dirname(dirname(__FILE__)));
        $filename = $file . DIRECTORY_SEPARATOR . str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        if (is_file($filename)) {
            require_once $filename;
        }
    }
}

spl_autoload_register('Rock_Core_AutoLoad::loadClass');
if (function_exists('__autoload')) {
    spl_autoload_register('__autoload');
}
