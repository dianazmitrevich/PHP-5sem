<?php

class Lab4
{
    public function task1()
    {
        $str = 'aaa bbaabbb ccaac ss aass';
        $substr = 'aa';

        if ($str && $substr) {
            echo 'Последнее подвхождение строки -'.strpos($str, $substr);
        } else {
            echo '<span style="color:red;">Нет такой последовательности</span>';
        }
    }

    public function task2()
    {
        $str = 'abc abc abc';

        echo 'Первая = '.strpos($str, 'b').'<br>';
        echo 'Последняя = '.strrpos($str, 'b').'<br>';
        echo 'С позиции 3 = '.strpos($str, 'b', 3).'<br>';
    }

    public function task3()
    {
        $str = 'Zolotaya osen ukrasila zemlyu';
        $values = explode(' ', $str);

        $temp1 = strtoupper($values[0]);
        $temp2 = strtoupper($values[1]);
        $values[0] = strtoupper($values[count($values) - 2]);
        $values[1] = strtoupper($values[count($values) - 1]);
        $values[count($values) - 2] = $temp1;
        $values[count($values) - 1] = $temp2;

        $str = implode(' ', $values);

        echo $str;
    }

    public function task4()
    {
        $main_str = 'abcd abc adbced';
        $sub_str = 'ced';
        $temp = strpos($main_str, $sub_str);

        if ($temp !== false) {
            echo($temp === 0 ? $sub_str.'<br>' : $main_str[$temp - 1].$sub_str.'<br>');
            echo $sub_str.'<br>';
            echo(($temp + strlen($sub_str)) < strlen($main_str) ? $main_str[$temp + strlen($sub_str)] : 'Подстрока находится в конце строки');
        } else {
            echo 'Подстрока не найдена';
        }
    }

    public function task5()
    {
        $str = 'kjh';

        if (strlen($str) > 10) {
            echo substr($str, 0, 6);
        } else {
            echo str_pad($str, 12, 'o');
        }
    }

    public function task6($Kd, $T, $Kh, $Yb, $Oh)
    {
        echo($Kd * pow(($T ** 2 * $Kh / $Yb / abs($Oh) ** 2), 1 / 3));
    }
}
