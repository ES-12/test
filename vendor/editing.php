<?php

session_start();
require_once 'connection.php';

//обработка запроса на изменение профиля

$new_name = $_POST['name'];
$new_phone_number = $_POST['phone_number'];
$new_email = $_POST['email'];
$new_password = $_POST['password'];
$new_password_confirm = $_POST['password_confirm'];

if ($new_password === $new_password_confirm) {
    $new_password = md5($password);

    /*проверка на отсутствие в БД
    имени пользователя, номера телефона и почты при регистрации
    и отправка сообщения, если имя, телефон или почта уже заняты*/

    if (mysqli_num_rows(mysqli_query($connection, "SELECT name FROM users WHERE name = '$new_name'")) > 0) {

        $_SESSION['message'] = 'Пользователь c таким именем уже существует';

        header('Location: ../edit.php');
    } elseif (mysqli_num_rows(mysqli_query($connection, "SELECT phone_number FROM users WHERE phone_number = '$new_phone_number'")) > 0) {

        $_SESSION['message'] = 'Пользователь c таким телефоном уже существует';

        header('Location: ../edit.php');
    } elseif (mysqli_num_rows(mysqli_query($connection, "SELECT email FROM users WHERE email = '$new_email'")) > 0) {

        $_SESSION['message'] = 'Пользователь c такой почтой уже существует';

        header('Location: ../edit.php');
    } else {

        mysqli_query($connection, "UPDATE `users` 
            SET `name` = 'new_name', `phone_number` = 'new_phone_number',
            `email` = 'new_email', `password` = 'new_password'
            WHERE `users`.`id` = ");

        /*при успешном изменении данных в БД
        перенаправление на страницу профиля
        и вывод сообщения об успешности операции*/

        $_SESSION['message'] = 'Данные изменены';

        header('Location: ../profile.php');
    }
} else {
    $_SESSION['message'] = 'Ошибка подтверждения пароля';

    header('Location: ../edit.php');
}
