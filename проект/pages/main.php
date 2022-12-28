<?php

// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

session_start();
$_SESSION['heading'] = 'Лабораторные работы по ДЭиВИ';

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php require '../partials/header.php'?>

    <div class="logout container">
        <form action="" method="post">
            <input class="logout-button" type="submit" value="Выйти" name="logout">
        </form>
    </div>

    <div class="page container">
        <div class="page__heading"><?php echo $_SESSION['heading']; ?></div>
        <div class="page__cards">
            <a href="https://www.figma.com/file/dUgOXfQsZ6qRTfqguv1FUo/Zmitrevich-Auto-(Copy)?t=t7ytdVR44Nkan1pi-0"
                target="__blank">
                <div class="page__card card-small">
                    <div class="card-inner">
                        <img src="../img/classic.png" alt="PHP">
                    </div>
                </div>
            </a>
            <a href="https://www.figma.com/file/dUgOXfQsZ6qRTfqguv1FUo/Zmitrevich-Auto-(Copy)?t=t7ytdVR44Nkan1pi-0"
                target="__blank">
                <div class="page__card card-large">
                    <div class="card-inner">
                        <img src="../img/minimalism.png" alt="PHP">
                    </div>
                </div>
            </a>

            <a href="https://www.figma.com/file/dUgOXfQsZ6qRTfqguv1FUo/Zmitrevich-Auto-(Copy)?t=t7ytdVR44Nkan1pi-0"
                target="__blank">
                <div class="page__card card-large">
                    <div class="card-inner">
                        <img src="../img/retro.png" alt="PHP">
                    </div>
                </div>
            </a>
            <a href="https://www.figma.com/file/dUgOXfQsZ6qRTfqguv1FUo/Zmitrevich-Auto-(Copy)?t=t7ytdVR44Nkan1pi-0"
                target="__blank">
                <div class="page__card card-small">
                    <div class="card-inner">
                        <img src="../img/grunge.png" alt="PHP">
                    </div>
                </div>
            </a>

            <a href="https://www.figma.com/file/dUgOXfQsZ6qRTfqguv1FUo/Zmitrevich-Auto-(Copy)?t=t7ytdVR44Nkan1pi-0"
                target="__blank">
                <div class="page__card card-small">
                    <div class="card-inner">
                        <img src="../img/metro.png" alt="PHP">
                    </div>
                </div>
            </a>
        </div>
    </div>

    <?php require '../partials/footer.php'?>
</body>

</html>