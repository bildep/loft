<?php
session_start();
require __DIR__ . '/func.php';
require __DIR__ . '/conf.php';
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/App.php';
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => HOST,
    'database'  => DB,
    'username'  => USER,
    'password'  => PASS,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

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
