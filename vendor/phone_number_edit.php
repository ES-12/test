<?php

session_start();
require_once 'connection.php';

//Обработка запроса на изменение телефона

$id = $_SESSION['user']['id'];
$new_phone_number = $_POST['phone_number'];

if (mysqli_num_rows(mysqli_query($connection, "SELECT `phone_number` FROM `users`
    WHERE `phone_number` = '$new_phone_number'")) > 0) {

    $_SESSION['message'] = 'Пользователь c таким телефоном уже существует';

    header('Location: ../edit.php');
} else {
    mysqli_query($connection, "UPDATE `users`
        SET `phone_number` = '$new_phone_number' WHERE `id` = '$id' ");

    $_SESSION['user']['phone_number'] = $new_phone_number;
    $_SESSION['message'] = 'Телефон изменен';

    header('Location: ../profile.php');
}
