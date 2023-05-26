<?php

session_start();
require_once 'connection.php';

//Обработка запроса на зменение почты

$id = $_SESSION['user']['id'];
$new_email = $_POST['email'];

if (mysqli_num_rows(mysqli_query($connection, "SELECT `email` FROM `users`
    WHERE `email` = '$new_email'")) > 0) {

    $_SESSION['message'] = 'Пользователь c такой почтой уже существует';

    header('Location: ../edit.php');
} else {
    mysqli_query($connection, "UPDATE `users`
        SET `email` = '$new_email' WHERE `id` = '$id' ");

    $_SESSION['user']['email'] = $new_email;
    $_SESSION['message'] = 'Почта изменена';

    header('Location: ../profile.php');
}
