<?php

session_start();
require_once 'connection.php';

//Обработка запроса на изменение имени

$id = $_SESSION['user']['id'];
$new_name = $_POST['name'];

if (mysqli_num_rows(mysqli_query($connection, "SELECT `name` FROM `users`
    WHERE `name` = '$new_name'")) > 0) {

    $_SESSION['message'] = 'Пользователь c таким именем уже существует';

    header('Location: ../edit.php');
} else {
    mysqli_query($connection, "UPDATE `users`
        SET `name` = '$new_name' WHERE `id` = '$id' ");

    $_SESSION['user']['name'] = $new_name;
    $_SESSION['message'] = 'Имя изменено';

    header('Location: ../profile.php');
}
