<?php

// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

require_once 'database/db.php';
$fp = fopen('registry.txt', 'a+');

session_start();

$nameError = '';
$loginError = '';
$emailError = '';
$passwordError = '';
$passwordCheckError = '';
$phoneError = '';
$captchaError = '';
$flag = true;

if (isset($_POST['go-reg'])) {
    $name = clearString($_POST['name']);
    $login = clearString($_POST['login']);
    $email = clearString($_POST['email']);
    $password = clearString($_POST['password']);
    $passwordCheck = clearString($_POST['password-check']);
    $phone = clearString($_POST['phone']);
    $captcha = clearString($_POST['captcha']);
    $gender = $_POST['gender'];

    if (!$name) {
        $nameError .= 'Заполните поле';
    } else if (!preg_match('/^[a-zA-Zа-яА-Я]+$/iu', $name)) {
        $nameError .= 'Имя должно содержать только буквы';
    }

    if (!$login) {
        $loginError .= 'Заполните поле';
    } else if (!preg_match('/^[a-zA-Zа-яА-Я\d_]{4,}$/iu', $login)) {
        $loginError .= 'Логин должен содержать только буквы, цифры или знак нижнего подчеркивания';
    } else if (preg_match_all('/(.)\1\1\1/iu', $login)) {
        $loginError .= 'В логине не может быть 4 повторяющихся символа';
    } else {
        $result = performQuery('SELECT id FROM users WHERE login = "' . $login . '"');
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $loginError .= 'Данный логин занят';
                $flag = false;
            }
        }
    }

    if (!$email) {
        $emailError .= 'Заполните поле';
    } else if (!preg_match('/^\w((\.\w)*\w+)*\w{2,}@\w((\.\w)*\w+)*\.\w+$/', $email)) {
        $emailError .= 'Указан неверный формат почты';
    } else if (preg_match('/\.io/', $email)) {
        $emailError .= 'Нельзя использовать почту с таким доменом';
    } else {
        $result = performQuery('SELECT id FROM users WHERE email = "' . $email . '"');
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) { 
                $emailError .= 'Данная почта уже используется';
                $flag = false;
            }
        }
    }

    if (!$password) {
        $passwordError = 'Заполните поле';
    } else if (!preg_match('/[\w\d]{10,}/', $password)) {
        $passwordError = 'Пароль не может быть менее 10 символов';
    } else if (preg_match('/[козел|баран|олух|kozel|baran|oluh]/iu', $password)) {
        $passwordError = 'Нельзя использовwwать подобные слова для пароля';
    }

    if (!$passwordCheck) {
        $passwordCheckError .= 'Заполните поле';
    } else if ($password != $passwordCheck) {
        $passwordCheckError .= 'Пароли не совпадают';
    }

    if (!$phone) {
        $passwordError .= 'Заполните поле';
    } else if (!preg_match('/^\+[0-9]{2}-[0-9]{2}-[0-9]{2}$/', $phone)) {
        $passwordError .= 'Телефон должен быть записан в формате +00-00-00';
    }

    if (!$captcha) {
        $captchaError .= 'Заполните поле';
    } else if ($captcha != $_SESSION['captcha']) {
        $captchaError .= 'Неверный текст';
    }
}

if (!$flag) {
    if (file_exists('registry.txt')) {
        fwrite($fp, 'Регистрация завершена ошибкой, время ' . date('Y-m-d h:i:s') . PHP_EOL);
    }
    // file_put_contents($fp, 'Регистрация завершена ошибкой, время ' . date('Y-m-d h:i:s') . PHP_EOL, FILE_APPEND);
    // fwrite($fp, 'Регистрация завершена ошибкой, время ' . date('Y-m-d h:i:s') . PHP_EOL);
} else {
    if (file_exists('registry.txt')) {
        if ($nameError . $loginError . $emailError . $passwordError . $passwordCheckError . $phoneError . $captchaError == '') {
            if ($name && $login && $email && $password && $phone && $gender) {
                $result = performQuery("INSERT INTO users(name, login, email, password, phone, gender) VALUES ('" . $name . "','" . $login . "','" . $email . "','" . md5($password) . "','" . $phone . "','" . $gender . "')");
            
                if ($result && isset($_POST['registry'])) {
                    fwrite($fp, 'Регистрация прошла успешно, время ' . date('Y-m-d h:i:s') . PHP_EOL);
                    header('Location: /pages/login.php');
                }    
            }
        }
    }
}

function clearString($str) {    
    return stripslashes(strip_tags(trim($str)));
}

function checkCaptcha() {
    if ($_POST['captcha'] == $_SESSION['captcha']) {
    return true;
    } else {
        return false;
    }
}