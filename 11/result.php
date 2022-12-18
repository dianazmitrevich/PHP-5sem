<?php

if (session_id() == '') {
    session_start();
}

$poll = [
    '1' => [
        'question' => '1. На каком этаже находится 408 кабинет?',
        'questionType' => 'radio',
        'answers' => [1, 2, 3, 4],
        'right' => 4,
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
        'right' => 2,
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
        'right' => [1, 2, 3, 4],
    ],
    '4' => [
        'question' => '4. Как называется ворона упавшая на оголенные провода?',
        'questionType' => 'text',
        'right' => '/\bэлектрокар\b/iu',
        'decoded' => 'Электрокар',
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
        'right' => 1,
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

    .percent {
        font-weight: 600;
        color: green;
    }

    .green {
        color: green;
    }

    .red {
        color: red;
    }
    </style>
</head>

<body>
    <?php
        $rightCount = 0;
        
        for ($i = 1; $i <= count($poll); $i++) {
            $results[] = $_GET["answers-$i"];

            $rightCount += count($poll[$i]['right']);
        }

        $right = 0;

        foreach ($poll as $key => $value) {
            if (is_int($value['right']) && $results[$key - 1] == $value['answers'][$value['right'] - 1]) {
                $right++;
            } else if (is_array($value['right'])) {
                foreach ($value['right'] as $r) {
                    $arr[] = $value['answers'][$r - 1];
                }

                foreach ($results[$key - 1] as $k) {
                    if (array_search($k, $arr) !== false) {
                        $right++;
                    }
                }
            } else if (is_string($value['right'])) {
                if (preg_match($value['right'], $results[$key - 1])) {
                    $right++;
                }
            }
        }

        $result = 100 * $right / $rightCount;
    ?>
    <div class="container">
        <div class="title mb-2">Лабораторная работа № 10. Передача данных. Работа с формами в PHP. Метод GET и POST
        </div>
        <div class="user"><i>Пользователь:
                <?php echo $_SESSION['user'] ?? 'сессия еще не открыта'; echo $result !== null ? "<br>Результат <span class='percent'>$result% ($right/$rightCount)</span>" : ''; ?></i>
        </div>
        <div class="test">
            <form action="result.php" methos="post">
                <?php foreach ($poll as $key => $value) {
                    echo '<div class="question"><div class="text">' . $value['question'] . '</div>';

                    if ($value['questionType'] == 'text') {
                        $flag = preg_match($value['right'], $results[3]) ? 'green' : 'red';
                        $decoded = $flag == 'red' ? $value['decoded'] : '';

                        echo '<input type="text" disabled name="answers-' . $key . '" value="' . $results[3] . '" class="' . $flag . '" /><span class="green">' . $decoded . '</span>';
                    } else if ($value['questionType'] == 'select') {
                        $flag = $results[4] == $value['answers'][$value['right'] - 1] ? 'green' : 'red';
                        $rightAnswer = $flag == 'red' ? $value['answers'][$value['right'] - 1] : '';
                        
                        echo '<select class="' . $flag . '" disabled name="answers-' . $key . '">';
                        
                        foreach ($value['answers'] as $answer) {
                            if ($answer = $results[4]) {
                                echo '<option selected>' . $answer . '</option>';
                            } else {
                                echo '<option>' . $answer . '</option>';
                            }
                        }

                        echo '</select><span style="margin-left: 10px;" class="green">' . $rightAnswer . '</span>';
                    } else {
                        foreach ($value['right'] as $r) {
                            $a[] = $value['answers'][$r - 1];
                        }
                        
                        foreach ($value['answers'] as $answer) {
                            $flag = array_search($answer, $a) !== false ? 'green' : 'red';
                            
                            if ($value['questionType'] == 'checkbox') {
                                if ($results[2] && array_search($answer, $results[2]) !== false) {
                                    echo '<input type="checkbox" disabled checked name="answers-' . $key . '[]" value="' . $answer . '"><span class="' . $flag . '">' . $answer . '</span></input><br>';
                                } else {
                                    echo '<input type="checkbox" disabled name="answers-' . $key . '[]" value="' . $answer . '"><span class="' . $flag . '">' . $answer . '</span></input><br>';
                                }
                            } else  {
                                $flag = $answer == $value['answers'][$value['right'] - 1] ? 'green' : 'red';

                                if ($results[$key - 1] == $value['answers'][$value['right'] - 1]) {
                                    $flag = $flag == 'red' ? '' : 'green';
                                }
                                
                                if ($answer == $results[$key - 1]) {
                                    echo '<input type="' . $value['questionType'] . '" disabled checked required name="answers-' . $key . '" value="' . $answer . '"><span class="' . $flag . '">' . $answer . '</span></input><br>';
                                } else {
                                    echo '<input type="' . $value['questionType'] . '" disabled required name="answers-' . $key . '" value="' . $answer . '"><span class="' . $flag . '">' . $answer . '</span></input><br>';
                                }
                            }
                        }
                    }
                    
                    echo '</div>';
                }
                ?>
            </form>
        </div>
    </div>
</body>

</html>