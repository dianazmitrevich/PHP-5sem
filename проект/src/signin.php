<?php

require_once '../database/db.php';

$loginError = '';
$passwordError = '';
$passwordCheckError = '';
$flag = false;

if (isset($_POST['go-reg'])) {
    $login = clearString($_POST['login']);
    $password = clearString($_POST['password']);
    $passwordCheck = clearString($_POST['password-check']);

    if (!$login) {
        $loginError .= 'Заполните поле';
    } else {
        $result = performQuery('SELECT id FROM users WHERE login = "' . $login . '"');
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if (!$row) {
                $loginError .= 'Пользователя с таким логином не существует';
            } else {
                if (!$password) {
                    $passwordError .= 'Заполните поле';
                } else {
                    if (!$passwordCheck) {
                        $passwordCheckError = 'Заполните поле';
                    } else {
                        if ($password != $passwordCheck) {
                            $passwordError .= 'Пароли не совпадают';
                            $passwordCheckError = 'Пароли не совпадают';
                        } else {
                            $result = performQuery('SELECT id, password FROM users WHERE login = "' . $login . '"');
                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                if ($row['password'] != md5($password)) {
                                    $passwordError .= 'Неправильный пароль';
                                } else {
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

if ($loginError . $passwordError . $passwordCheckError == '') {
    if ($flag) {
        header('Location: ../pages/main.php');
    }
}

function clearString($str) {    
    return stripslashes(strip_tags(trim($str)));
}