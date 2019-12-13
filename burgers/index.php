<?php
require __DIR__ . '/src/functions.php';
if( ! empty($_POST['subm'])) {
    checkUser($_POST);
}
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/tpl/');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/tpl/cache',
]);

echo $twig->render('template.twig', ['title' => 'Бургерная', 'desc' => 'Натуральные бургеры']);


