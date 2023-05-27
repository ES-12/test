<?php

session_start();
require_once 'connection.php';

//Обработка запроса на изменение пароля

$id = $_SESSION['user']['id'];
$new_password = $_POST['new_password'];
$new_password_confirm = $_POST['new_password_confirm'];

if ($new_password === $new_password_confirm) {
    $new_password = md5($new_password);

    mysqli_query($connection, "UPDATE `users`
        SET `password` = '$new_password' WHERE `id` = '$id' ");

    $_SESSION['message'] = 'Пароль изменен';

    header('Location: ../profile.php');
}
