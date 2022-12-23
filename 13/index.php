<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$host = 'localhost';
$database = 'mini_shop';
$user = 'root';
$password = 'root';

$link = mysqli_connect($host, $user, $password, $database) or die('Ошибка' . mysqli_error($link));

if (isset($_GET['delete'])) {
    $result = performQuery("SELECT id, name FROM products WHERE category_id = ". $_GET['delete-categories']);
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            performQuery("DELETE FROM products WHERE category_id = ". $_GET['delete-categories']);
        }
    }
    
    performQuery("DELETE FROM categories WHERE id = ". $_GET['delete-categories']);
}

if (isset($_GET['add'])) {
    if ($_GET['new-category']) {
        performQuery("INSERT INTO categories(name) VALUES ('" . $_GET['new-category'] . "')");
    }
}

if (isset($_GET['edit'])) {
    performQuery("UPDATE categories SET name = '" . $_GET['new-name'] . "' WHERE id = " . $_GET['old-name']);
}

function performQuery($query) {
    return mysqli_query($GLOBALS['link'], $query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>13</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <style>
    body {
        width: 800px;
        margin: 0 auto;
    }

    .container-1 {
        padding: 40px 0;
    }

    form {
        margin-bottom: 40px;
    }

    form input,
    form select {
        height: 40px;
        padding: 10px;
    }

    form input[type="submit"] {
        margin-top: -4px;
    }
    </style>

    <div class="container-1">
        <ol>
            <?php
            $result = performQuery('SELECT * FROM categories');
        
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li>' . $row['name'] . '</li>';
                }
            }
            ?>
        </ol>
    </div>

    <div class="container-2">
        <form action="" method="get">
            <input type="text" name="new-category">
            <input type="submit" class="btn btn-success" value="Добавить" name="add">
        </form>

        <form action="" method="get">
            <select name="delete-categories">
                <?php
                $result = performQuery('SELECT * FROM categories');
            
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                    }
                }
                ?>
            </select>
            <input type="submit" class="btn btn-danger" value="Удалить" name="delete">
        </form>

        <form action="" method="get">
            <select name="old-name">
                <?php
                $result = performQuery('SELECT * FROM categories');
            
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                    }
                }
                ?>
            </select>
            <input type="text" name="new-name">
            <input type="submit" class="btn btn-warning" value="Изменить" name="edit">
        </form>
    </div>
    <div class="container-3">
        <a href="page.php">Вторая страница</a>
    </div>
</body>

</html>