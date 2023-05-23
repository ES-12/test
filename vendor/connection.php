<?php

//соединение с БД

$connection = mysqli_connect('localhost', 'root', '', 'users_db');
if (!$connection) {
    die('DB connection error');
} //else echo 'connected';
