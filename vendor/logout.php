<?php

//завершение активной сессии

session_start();
unset($_SESSION['user']);
header('Location: ../index.php');
