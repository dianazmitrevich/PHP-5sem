<?php

require_once 'header.php';

function task4(...$params) {
    $sum = 0;

    for ($i = 0; $i < count($params); $i++) {
        $sum += $params[$i] * $params[$i + 1];
    }
    
    return $sum;
}
?>

<div class="container">
    <div class="session">
        <div class="session__name"><?php session_start(); echo $_SESSION['name'] ?? 'Сессия еще не открыта'; ?></div>
        <a href="index.php">Вернуться на главную</a>
    </div>

    <div class="task">
        <div class="text" style="font-style: italic; margin: 20px 0;">Написать функцию с переменным числом параметров,
            которая находит сумму чисел типа int по формуле: S=a1*a2+a2*a3+a3*a4+. . . . .</div>
        <div class="result">Сумма - <?php echo task4(1, 2, 3, 4); ?></div>
    </div>
</div>

<?php
require_once 'footer.php';
?>