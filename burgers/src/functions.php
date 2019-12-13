<?php
session_start();
require_once __DIR__ .'/../vendor/autoload.php';

global $pdo;
try {
    $pdo = new PDO("mysql:host=localhost;dbname=burger", 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}


function checkUser($post = [])
{
    global $pdo;
    if (empty($post['email'])) {
        return false;
    }
    $query = $pdo->prepare("SELECT * FROM users WHERE `email` = :email");
    $query->execute(['email' => $post['email']]);
    $user = $query->fetchAll(PDO::FETCH_ASSOC);

    if (count($user)) {
        $userId = $user[0]['id'];
        $orderId = addOrder($post, $userId);
        sendMail($post, $orderId);

    } else {
        register($post);
    }
    return true;
}

function getAllUsers()
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM users");
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function getAllOrders()
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM orders");
    $query->execute();
    $orders = $query->fetchAll(PDO::FETCH_ASSOC);
    return $orders;
}

function register($post)
{
    global $pdo;
    if (empty($post['name']) || empty($post['email']) || empty($post['phone'])) {
        return false;
    }
    $query = $pdo->prepare("INSERT INTO `users` (`name`, `email`, `phone`) VALUES (?, ?, ?)");
    $query ->execute([$post['name'], $post['email'], $post['phone']]);
    return $pdo->lastInsertId(); //id added users
}

function addOrder($post, $userId)
{
    global $pdo;
    if (empty($post['street']) || empty($post['home']) || empty($post['part']) || empty($post['appt']) || empty($post['floor'])) {
        return false;
    }
    $address = 'ул.' . strip_tags($post['street']) . ' д. ' . strip_tags($post['home']) . ' корп. ' . strip_tags($post['part']) . ' кв.' .strip_tags($post['appt']) . ' эт.' . strip_tags($post['floor']);

    $other = $post['comment'];
    $query = $pdo->prepare("INSERT INTO `orders` (`user_id`, `address`, `otherinfo`) VALUES (?, ?, ?)");
    $query ->execute([$userId, $address, $other]);
    return $pdo->lastInsertId(); //id order
}



function sendMail($post, $orderId)
{

    // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.mail.ru', 465, 'ssl'))
        ->setUsername(MANDRILL_USERNAME)
        ->setPassword( MANDRILL_PASSWORD)
    ;

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $title = 'Заказ №' . $orderId;
    $msg = "Ваш заказ будет доставлен по адресу:\n";
    $msg .=  'ул.' . strip_tags($post['street']) . ' д. ' . strip_tags($post['home']) . ' корп. ' . strip_tags($post['part']) . ' кв.' .strip_tags($post['appt']) . ' эт.' . strip_tags($post['floor']);
    $msg .= "\nDarkBeefBurger за 500 рублей, 1 шт\n";

    $message = (new Swift_Message($title))
        ->setFrom(['loftschool.darazum@mail.ru' => 'loftschool.darazum@mail.ru'])
        ->setTo([$post['email']])
        ->setBody($msg);

// Send the message
    $result = $mailer->send($message);
 // var_dump(['res' => $result]);

    $numOrders = getNumOrders($post);
    if ($numOrders > 1) {
        $msg .= "\nСпасибо! Это уже $numOrders заказ";
    } else {
        $msg .= "\nСпасибо - это ваш первый заказ";
    }
    //mail($post['email'], $title, $msg);
}

function getNumOrders($post)
{
    global $pdo;
    $sql = "SELECT orders.id, orders.user_id FROM orders WHERE user_id  IN (SELECT id FROM users WHERE email = :email)";
    $query = $pdo->prepare($sql);
    $query->execute(['email' => $post['email']]);
    $orders = $query->fetchAll(PDO::FETCH_ASSOC);
    return count($orders);
}

