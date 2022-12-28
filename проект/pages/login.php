<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (isset($_POST['sign-in'])) {
    header('Location: ../index.php');
}

require_once '../src/signin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php require '../partials/header.php'?>

    <main>
        <div class="container">
            <div class="heading">Вход</div>
            <form action="" method="post" class="form">
                <div class="form__field">
                    <input type="text" name="login" id="login" value="<?=@$login;?>">
                    <label for=" login">Введите логин</label>
                    <div class="error"><?=@$loginError;?></div>
                </div>

                <div class="form__field">
                    <input type="password" name="password" id="password" value="<?=@$password;?>">
                    <label for="password">Введите пароль</label>
                    <div class="error"><?=@$passwordError;?></div>
                </div>

                <div class="form__field">
                    <input type="password" name="password-check" id="password-check" value="<?=@$passwordCheck;?>">
                    <label for="password-check">Повторите пароль</label>
                    <div class="error"><?=@$passwordCheckError;?></div>
                </div>

                <div class="form__submit mt-4">
                    <input type="hidden" name="go-reg" value="5">
                    <input type="submit" value="Войти">
                </div>

                <input type="submit" name="sign-in" value="Регистрация" class="registry-button">
            </form>
        </div>
    </main>

    <script src="../js/login.js"></script>
    <?php require '../partials/footer.php'?>
</body>

</html>