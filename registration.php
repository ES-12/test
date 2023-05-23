<?php
session_start();

//перенаправление на страницу профиля, при успешной аутентификации

if (isset($_SESSION['user'])) {
    header('Location: profile.php');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<!-- страница с формой для ввода данных для регистрации -->

<body>
    <form action="vendor/signup.php" method="post">

        <label>Имя</label>
        <input type="text" name="name">

        <label>Телефон</label>
        <input type="text" name="phone_number">

        <label>Почта</label>
        <input type="text" name="email">

        <label>Пароль</label>
        <input type="password" name="password">

        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm">

        <button type="submit">Зарегистрироваться</button>
        <a href="/">Уже есть аккаунт</a>

        <!-- вывод ошибки аутентификации -->

        <?php
        if (isset($_SESSION['message'])) {
            echo '<p> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>

    </form>
</body>

</html>