<?php

class Lab6
{
    public function task1() // 10
    {
        $x = ['color1', 'color20', 'color3', 'color2'];

        var_dump($x);
        echo '<br>';
        array_multisort($x, SORT_NATURAL | SORT_FLAG_CASE);
        var_dump($x);
    }

    public function task2() // 11
    {
        $x = ['c1' => 'Red', 'c2' => 'Green', 'c3' => 'Yellow', 'c4' => 'Red'];

        var_dump($x);
        echo '<br>';
        $sortedArr = array_count_values($x);

        echo $sortedArr['Red'];
    }

    public function task3() // 13
    {
        $x = ['a', 'b', 'c', 'd', 'e'];

        var_dump($x);
        echo '<br>';

        $temp = array_change_key_case(array_flip($x), CASE_UPPER);
        $outputArr = array_flip($temp);

        var_dump($outputArr);
    }

    public function task4() //6
    {
        $x = ['abcd', 'abc', 'de', 'alnyf', 'g', 'wer'];

        function charCode($value)
        {
            return strlen($value);
        }

        $y = array_map('charCode', $x);
        $combinedArr = array_combine($x, $y);

        asort($combinedArr);

        echo 'Самая короткая строка - ' . array_key_first($combinedArr) . '<br>';
        echo 'Самая длинная строка - ' . array_key_last($combinedArr);
    }
}
