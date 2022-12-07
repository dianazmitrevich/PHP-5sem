<?php

require_once 'header.php';

$num1 = 1;
$num2 = 10;

function task3(&$num1, &$num2) {
    $num1++; $num2 -= 3;
    
    return $num1 . ' ' . $num2;
}
?>

<div class="container">
    <div class="session">
        <div class="session__name"><?php session_start(); echo $_SESSION['name'] ?? 'Сессия еще не открыта'; ?></div>
        <a href="index.php">Вернуться на главную</a>
    </div>

    <div class="task">
        <div class="text" style="font-style: italic; margin: 20px 0;">Написать пользовательскую функцию, которая первое
            число увеличивает на единицу, а второе число уменьшает на три. Сделать так, чтобы функция имела возможность
            изменять значение аргументов глобально.</div>
        <div class="result">Числа до операций - <?php echo $num1 . ' ' . $num2; ?></div>
        <div class="result">Полученные числа - <?php echo task3($num1, $num2); ?></div>
        <div class="result">Числа после операций - <?php echo $num1 . ' ' . $num2; ?></div>
    </div>
</div>

<?php
require_once 'footer.php';
?>