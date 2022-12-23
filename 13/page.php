<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$host = 'localhost';
$database = 'mini_shop';
$user = 'root';
$password = 'root';

$link = mysqli_connect($host, $user, $password, $database) or die('Ошибка' . mysqli_error($link));

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
    <title>13-2</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <style>
    body {
        width: 800px;
        margin: 0 auto;
    }

    .container {
        width: 100%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 40px;
    }

    .card {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 250px !important;
        height: 120px;
        background: #f2f2f2;
        border: none;
        margin: 10px 0;
    }
    </style>

    <div class="container">
        <?php
        $result = performQuery('SELECT * FROM products');
    
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="card">
                    <div class="card__name"><b>' . $row['name'] . '</b></div>
                    <div class="card__text"><b>' . $row['description'] . '</b></div>
                    <div class="card__category"><b>' . mysqli_fetch_assoc(performQuery("SELECT name FROM categories WHERE id = " . $row['category_id']))['name'] . '</b></div>
                    <div class="card__price"><b>' . $row['price'] . '</b></div>
                </div>';
            }
        }
        ?>
    </div>
    <a href="index.php">Первая страница</a>
</body>

</html>