<?php
session_start();

//при отсутствии активной сессии перенаправление на корневую страницу с формой для входа

if (!$_SESSION['user']) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Изменение данных профиля</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<!-- страница с формой для изменения данных зарегистрированных пользователей -->

<body>
    <form action="vendor/editing.php" method="post">

        <h2>Изменение профиля</h2>

        <!-- функционал обновления данных пока не реализован -->

        <label>Новое имя</label>
        <input type="text" name="name">

        <label>Новый телефон</label>
        <input type="text" name="phone_number">

        <label>новая почта</label>
        <input type="text" name="email">

        <label>Новый пароль</label>
        <input type="password" name="password">

        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm">

        <button type="submit">Изменение данных</button>
        <a href="profile.php">Вернуться</a>
        <a href="vendor/logout.php">Выход</a>

        <!-- вывод ошибки изменения данных -->

        <?php
        if (isset($_SESSION['message'])) {
            echo '<p> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>

    </form>
</body>

</html>