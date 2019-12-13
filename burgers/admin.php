<?php
require __DIR__ . '/src/functions.php';
$users = getAllUsers($pdo);

echo 'Все пользователи<br>';
foreach ($users as $user) {

    echo $user['id'] . ' ' . $user['name'] . ' ' . $user['email'] . ' ' . $user['phone'] . '<br>';
}
echo '<br><hr>';
echo 'Все заказы<br>';

$orders = getAllOrders($pdo);

foreach ($orders as $order) {

    echo $order['id'] . ' ' . $order['user_id'] . ' ' . $order['address'] . ' ' . $order['otherinfo'] . '<br>';
}