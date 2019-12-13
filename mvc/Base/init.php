<?php
session_start();
require __DIR__ . '/func.php';
require __DIR__ . '/conf.php';
require __DIR__ . '/App.php';

spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    $dirs = ['Controllers' , 'Models', 'Views'];
    foreach ($dirs as $dir) {
        $path = __DIR__  .'/../'.$dir.'/';
        if (file_exists($path .$className.'.php')) {
            include $path .$className.'.php';
            break;
        }
    }
}
