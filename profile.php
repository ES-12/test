<?php
session_start();

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

<body>
    <form>
        <h2>Имя: <?= $_SESSION['user']['name'] ?></h2>
        <h2>Телефон: <?= $_SESSION['user']['phone_number'] ?></h2>
        <h2>Почта: <?= $_SESSION['user']['email'] ?></h2>
        <a href="vendor/logout.php">Выход</a>
    </form>
</body>

</html>