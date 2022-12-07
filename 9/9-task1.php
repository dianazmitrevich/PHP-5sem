<?php

require_once 'header.php';

function task1($num, $separator) {
    $res = '';

    for ($i = 1; $i <= $num; $i++) {
        $res .= $separator . $i;
    }

    return $res . $separator;
}
?>

<div class="container">
    <div class="session">
        <div class="session__name"><?php session_start(); echo $_SESSION['name'] ?? 'Сессия еще не открыта'; ?></div>
        <a href="index.php">Вернуться на главную</a>
    </div>

    <div class="task">
        <div class="text" style="font-style: italic; margin: 20px 0;">Напишите пользовательскую функцию, которая
            принимает два параметра – число и разделитель, например, (9, -) и с помощью цикла for формирует строку вида
            -1-2-3-4-5-6-7-8-9-.</div>
        <div class="result"><?php echo task1(9, '-'); ?></div>
    </div>
</div>

<?php
require_once 'footer.php';
?>