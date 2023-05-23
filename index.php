<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: profile.php');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <form action="vendor/signin.php" method="post">

        <label>Логин</label>
        <input type="text" name="login" placeholder="Почта или телефон">

        <label>Пароль</label>
        <input type="password" name="password">

        <button type="submit">Войти</button>
        <a href="registration.php">Ещё нет аккаунта</a>

        <?php
        if (isset($_SESSION['message'])) {
            echo '<p> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>

    </form>
</body>

</html>