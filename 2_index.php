<?php

# boolean
# integer
# float
# string
# array

$str1 = 'переменные';

var_dump((bool) '');
var_dump((bool) -1);
var_dump((bool) []);
var_dump((bool) 'false');

echo '<br>';
var_dump((float) 0123);
var_dump((float) 0x1A);
var_dump(intval(1.55));
var_dump((float) 0b1111111);
var_dump((0.1 + 0.7) * 10);

echo '<br>';

echo('В одинарных кавычках для использования одной одинарной кавычки нужно предварить ее косой чертой - \'<br>');
echo("Двойные кавычки позволяют явно прописывать в них $str1<br>");
echo <<<END
Пример с
использованием
heredoc-синтаксиса<br>
END;

$arr['пятница'] = ['date' => '23', 'month' => 'сентября', 'year' => '2022'];
$arr['суббота'] = ['date' => '24', 'month' => 'сентября', 'year' => '2022'];
$arr['воскресенье'] = ['date' => '25', 'month' => 'сентября', 'year' => '2022'];

$day = 'суббота';
echo 'Сегодня ' . $arr[$day]['date'] . ' ' . $arr[$day]['month'] . ' ' . $arr[$day]['year'] . ' года';
