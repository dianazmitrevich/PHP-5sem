<?php

$host = 'localhost';
$database = 'project';
$user = 'root';
$password = 'root';

$link = mysqli_connect($host, $user, $password, $database) or die('Ошибка' . mysqli_error($link));

function performQuery($query) {
    return mysqli_query($GLOBALS['link'], $query);
}