<?php

require_once 'header.php';

function task2($num, $lang) {
    $days = [
        'rus' => ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'],
        'eng' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
    ];

    return $days[$lang][$num - 1];
}
?>

<div class="container">
    <div class="session">
        <div class="session__name"><?php session_start(); echo $_SESSION['name'] ?? 'Сессия еще не открыта'; ?></div>
        <a href="index.php">Вернуться на главную</a>
    </div>

    <div class="task">
        <div class="text" style="font-style: italic; margin: 20px 0;">Напишите функцию, которая принимает параметром
            число от 1 до 7 и флаг языка (rus / eng), а возвращает день недели на русском / английском языках.</div>
        <div class="result">Выбранный день недели - <?php echo task2(1, 'eng'); ?></div>
    </div>
</div>

<?php
require_once 'footer.php';
?>