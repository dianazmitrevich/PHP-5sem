<?php

if (session_id() == '') {
    session_start();

    $_SESSION['user'] = $_GET['fio'];
}

$poll = [
    '1' => [
        'question' => '1. На каком этаже находится 408 кабинет?',
        'questionType' => 'radio',
        'answers' => [1, 2, 3, 4],
    ],
    '2' => [
        'question' => '2. Как расшифровывается ФИТ?',
        'questionType' => 'radio',
        'answers' => [
            'Фреймворк интеллектуального тестирования',
            'Факультет информационных технологий',
            'Федерация интернационального тенниса',
            'Фу изучать тестирование'
        ],
    ],
    '3' => [
        'question' => '3. Какого обычно цвета апельсины?',
        'questionType' => 'checkbox',
        'answers' => [
            'pomaranczowy',
            'оранжевый',
            '#FF9211',
            'البرتقالي'
        ],
    ],
    '4' => [
        'question' => '4. Как называется ворона упавшая на оголенные провода?',
        'questionType' => 'text',
    ],
    '5' => [
        'question' => '5. Как в английском языке будет Олег без ног?',
        'questionType' => 'select',
        'answers' => [
            'О',
            'Олег',
            'nOleg',
            'OLED'
        ],
    ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>11</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
    body {
        background: #F2F2F2;
    }

    .container {
        margin-top: 40px;
        height: auto;
        width: 800px;
        background: #fff;
        padding: 50px 40px;
        border-top: 4px solid #8675EE;
        border-radius: 5px;
        margin-bottom: 40px;
    }

    .container .title {
        width: 90%;
        font-size: 24px;
        font-weight: 600;
    }

    .container .user {
        font-size: 14px;
    }

    .test {
        display: flex;
        flex-direction: column;
    }

    .test .question {
        border-bottom: 1px solid #E9E9E9;
        padding: 20px 0;
        font-size: 14px;
    }

    .test .question:last-of-type {
        border: none;
        margin-bottom: 40px;
    }

    .test .question .text {
        margin-bottom: 5px;
    }

    .test .question input {
        margin-right: 5px;
        cursor: pointer;
    }

    .check-results {
        padding: 10px 25px;
        background: #6F5CE0;
        border: none;
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        border-radius: 5px;
        transition: background .3s ease-in-out;
    }

    .check-results:hover {
        cursor: pointer;
        background: #624FD4;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="title mb-2">Лабораторная работа № 10. Передача данных. Работа с формами в PHP. Метод GET и POST
        </div>
        <div class="user"><i>Пользователь: <?php echo $_SESSION['user'] ?? 'сессия еще не открыта'; ?></i></div>
        <div class="test">
            <form action="result.php" methos="post">
                <?php foreach ($poll as $key => $value) {
                    echo '<div class="question"><div class="text">' . $value['question'] . '</div>';

                    if ($value['questionType'] == 'text') {
                        echo '<input type="text" required name="answers-' . $key . '"></input><br>';
                    } else if ($value['questionType'] == 'select') {
                        echo '<select required name="answers-' . $key . '">';
                        
                        foreach ($value['answers'] as $answer) {
                            echo '<option value="' . $answer . '">' . $answer . '</option>';
                        }

                        echo '</select>';
                    } else {
                        foreach ($value['answers'] as $answer) {
                            if ($value['questionType'] == 'checkbox') {
                                echo '<input type="checkbox" name="answers-' . $key . '[]" value="' . $answer . '">' . $answer . '</input><br>';
                            } else  {
                                echo '<input type="' . $value['questionType'] . '" required name="answers-' . $key . '" value="' . $answer . '">' . $answer . '</input><br>';
                            }
                        }
                    }

                    echo '</div>';
                }
                ?>
                <input class="check-results" type="submit" value="Проверить" />
            </form>
        </div>
    </div>
</body>

</html>