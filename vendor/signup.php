<?php

session_start();
require_once 'connection.php';

$name = $_POST['name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password === $password_confirm) {
    $password = md5($password);

    mysqli_query($connection, "INSERT INTO `users`
        (`id`, `name`, `phone_number`, `email`, `password`)
        VALUES (NULL, '$name', '$phone_number', '$email', '$password') ");

    $_SESSION['message'] = 'Регистрация завершена';

    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Ошибка подтверждения пароля';

    header('Location: ../registration.php');
}
