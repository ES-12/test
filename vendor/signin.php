<?php

session_start();
require_once 'connection.php';

$login = $_POST['login'];
$password = $_POST['password'];
$password = md5($_POST['password']);

$login_check = mysqli_query($connection, "SELECT * FROM users
    WHERE email = '$login' OR phone_number = '$login' AND password = '$password'");
$user = mysqli_fetch_assoc($login_check);

if (!empty($user)) {

    $_SESSION['user'] = [
        "name" => $user['name'],
        "phone_number" => $user['phone_number'],
        "email" => $user['email']
    ];

    header('Location: ../profile.php');
} else {
    $_SESSION['message'] = 'Проверьте правильность ввода данных';
    header('Location: ../index.php');
}
