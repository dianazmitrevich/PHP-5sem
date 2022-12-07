<?php

class Lab4
{
    public function task1()
    {
        $str = 'aaa bbaabbb ccaac ss aass';
        $substr = 'aa';

        if ($str && $substr) {
            echo 'Последнее подвхождение строки - '.strrpos($str, $substr);
        } else {
            echo 'Нет такого';
        }
    }

    // stripos is case-insensitive

    public function task2()
    {
        $str = '1a2b3c4b5d6e7f8g9h0';

        echo preg_replace('/\D/', '', $str);
    }

    public function task3()
    {
        $main_str = 'dog cat dog';
        $length = strlen($main_str);
        $n = rand(1, $length / 2);

        $first_str = substr($main_str, 0, $n);
        $last_str = substr($main_str, $length - $n, $length);

        echo $n.'<br>';
        echo $first_str.'<br>';
        echo $last_str.'<br>';

        if (!strcasecmp($first_str, $last_str)) {
            echo 'Строки равны';
        } else {
            echo 'Строки не равны';
        }
    }

    public function task4()
    {
        $str = 'Zolotaya osen ukrasila zemlyu';

        $temp1 = strtoupper(substr($str, 0, strpos($str, ' ', strpos($str, ' ') + 1)));
        $temp2 = substr($str, strrpos($str, ' '), strlen($str));

        $str = mb_substr($str, strlen($temp1));
        $str = substr($str, 0, strrpos($str, $temp2));

        echo strtoupper($temp2) . $str . ' ' . $temp1 . '<br>';
    }

    public function task5()
    {
        $str = 'osen ukrasila zemlyu';
        $length = strlen($str);

        $first_str = substr($str, 0, $length / 5 * 3);
        $last_str = substr($str, $length / 5 * 3);

        echo $first_str .'<br>';
        echo $last_str .'<br><br>';

        $first_sym = chr(ord(substr($first_str, 0, 1)) + strlen($first_str) / 2);
        $first_part = substr($first_str, 1, strlen($first_str) / 2);
        $second_sym = chr(ord(substr($first_str, strlen($first_str) / 2 + 1, 1)) + strlen($first_str) / 2);
        $second_part = substr($first_str, strlen($first_str) / 2 + 2);
        $third_sym = chr(ord(substr($first_str, strlen($first_str) - 1, 1)) + strlen($first_str) / 2);

        $first_str = $first_sym . $first_part  . $second_sym . $second_part . $third_sym;
        $first_str = str_replace('As', 'xT', $first_str);

        $last_str = strtoupper(substr($last_str, 0, 1)).strtolower(substr($last_str, 1, strlen($last_str) - 2)).strtoupper(substr($last_str, strlen($last_str) - 1, 1));

        echo $first_str . '<br>';
        echo $last_str;
    }

    public function task6($Kd, $T, $Kh, $Yb, $Oh)
    {
        echo($Kd * pow(($T ** 2 * $Kh / $Yb / abs($Oh) ** 2), 1 / 3));
    }
}
