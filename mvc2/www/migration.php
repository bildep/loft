<?php
require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'shop',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

$capsule->bootEloquent();

Capsule::schema()->dropIfExists('products');

Capsule::schema()->create('products', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->text('description');
    $table->string('price');
    $table->string('images');
    $table->integer('category_id');
    $table->timestamps(); //created_at&updated_at тип datetime
});

Capsule::schema()->dropIfExists('categories');

Capsule::schema()->create('categories', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
});