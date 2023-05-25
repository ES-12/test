<?php

session_start();
require_once 'connection.php';

//обработка запроса на регистрацию

$name = $_POST['name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password === $password_confirm) {
    $password = md5($password);

    /*проверка на отсутствие в БД
    имени пользователя, номера телефона и почты при регистрации
    и отправка сообщения, если имя, телефон или почта уже заняты*/

    if (mysqli_num_rows(mysqli_query($connection, "SELECT `name` FROM `users` WHERE `name` = '$name'")) > 0) {

        $_SESSION['message'] = 'Пользователь c таким именем уже существует';

        header('Location: ../registration.php');
    } elseif (mysqli_num_rows(mysqli_query($connection, "SELECT `phone_number` FROM `users` WHERE `phone_number` = '$phone_number'")) > 0) {

        $_SESSION['message'] = 'Пользователь c таким телефоном уже существует';

        header('Location: ../registration.php');
    } elseif (mysqli_num_rows(mysqli_query($connection, "SELECT `email` FROM `users` WHERE `email` = '$email'")) > 0) {

        $_SESSION['message'] = 'Пользователь c такой почтой уже существует';

        header('Location: ../registration.php');
    } else {

        mysqli_query($connection, "INSERT INTO `users`
        (`id`, `name`, `phone_number`, `email`, `password`)
        VALUES (NULL, '$name', '$phone_number', '$email', '$password') ");

        /*при успешной регистрации и занесении данных в БД
        перенаправление на корневую страницу для авторизации
        и вывод сообщения об успешности операции*/

        $_SESSION['message'] = 'Регистрация завершена';

        header('Location: ../index.php');
    }
} else {
    $_SESSION['message'] = 'Ошибка подтверждения пароля';

    header('Location: ../registration.php');
}
