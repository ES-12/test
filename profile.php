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
    <title>Профиль</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<!-- страница с профилем пользователя и кнопкой для выхода -->

<body>
    <h2>Профиль пользователя</h2>
    <form>

        <!-- <h2>id: <?= $_SESSION['user']['id'] ?></h2> -->
        <h2>Имя: <?= $_SESSION['user']['name'] ?></h2>
        <h2>Телефон: <?= $_SESSION['user']['phone_number'] ?></h2>
        <h2>Почта: <?= $_SESSION['user']['email'] ?></h2>

        <a href="edit.php">Изменение данных</a>
        <a href="vendor/logout.php">Выход</a>

    </form>
    <!-- вывод сообщения об успешном изменении данных -->
    <?php
    if (isset($_SESSION['message'])) {
        echo '<p> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
    ?>
</body>

</html>