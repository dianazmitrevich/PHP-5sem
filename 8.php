<?php

// 5
class Lab8
{
    public function task1()
    {
        $matrix = [
            [1, 2, 1],
            [3, 1, 10],
            [2, 10, 1],
        ];
        $num = [];
        $temp = 0;

        for ($i = 0; $i < 3; $i++) {
            for ($y = 0; $y < 3; $y++) {
                if ($matrix[$i][$y] > $temp) {
                    $temp = $matrix[$i][$y];

                    $num['value'] = $temp;
                    $num['indexes'] = $i . ' ' . $y;
                }
            }
        }

        $this->printResults($num);
    }

    public function task2()
    {
        $matrix = [
            [2, 3, 1],
            [3, 1, 8],
            [1, 2, 1],
            [2, 3, 5],
        ];

        $temp = [];

        foreach ($matrix as $value) {
            $sum = 0;

            foreach ($value as $item) {
                $sum += $item;
            }

            $temp[$sum] = $value;
        };

        sort($temp);

        foreach ($temp as $value) {
            for ($i = 0; $i < count($value); $i++) {
                echo $value[$i];
            }

            echo '<br>';
        }


        // $this->printResults($temp);
    }

    public function task3()
    {
        $numbers = [5, 1, 3, 1, 4, 3, 1];
        $temp = [];
        $result = [];
        $counter = 0;

        $temp = array_count_values($numbers);

        foreach ($temp as $value) {
            if ($value == 1) {
                array_push($result, array_keys($temp)[$counter]);
            }

            $counter++;
        }

        $this->printResults($result);
    }

    public function task4()
    {
        $matrix1 = [
            [1, 5, 2, 1],
            [1, 3, 1, 4],
            [2, 2, 5, 1],
        ];

        $matrix2 = [
            [1, 1, 3, 3],
            [2, 1, 1, 2],
            [1, 2, 6, 3],
        ];

        $temp = [
            'km' => 0,
            'kr' => 0,
            'kb' => 0,
        ];

        for ($i = 0; $i < 3; $i++) {
            for ($y = 0; $y < 4; $y++) {
                $matrix1[$i][$y] == $matrix2[$i][$y] ? $temp['kr']++
                : ($matrix1[$i][$y] > $matrix2[$i][$y] ? $temp['kb']++
                : $temp['km']++);
            }
        }

        $this->printResults($temp);
    }

    public function task5($n, $a)
    {
        $result = 0;

        for ($i = $n + 1; $i > 1; $i--) {
            $temp = $result;

            $result = pow($temp + $a, 1 / $i);
        }

        $this->printResults($result);
    }

    public function task6()
    {
        $sequence = [3, 2, 1];
        $result = 'Нет';

        foreach ($sequence as $key => $value) {
            if ($key == (count($sequence) - 1)) {
                continue;
            }

            if ($value > $sequence[$key + 1]) {
                $result = 'Да';
            } else {
                $result = 'Нет';

                break;
            }
        }

        $this->printResults($result);
    }

    public function task7()
    {
        $matrix = [
            [1, 2, 1],
            [3, -9, 10],
            [2, 10, 4],
        ];

        for ($i = 0; $i < count($matrix); $i++) {
            if ($matrix[$i][$i] % 2 != 0 && $matrix[$i][$i] < 0) {
                return $this->printResults('Да');
            }
        }

        return $this->printResults('Нет');
    }

    public function task8()
    {
        $numbers = [1, 0, 0, 9, 0];
        $result = 'Нет';

        foreach ($numbers as $key => $value) {
            if ($key == (count($numbers) - 1)) {
                continue;
            }

            if ($value === 0 && $numbers[$key + 1] === 0) {
                $result = 'Да';
            }
        }

        $this->printResults($result);
    }

    public function task9()
    {
        $matrix = [
            [-1, 2, 1, 2],
            [3, 5, 2, 1],
            [2, 3, -2, 1],
            [2, 1, 3, 2],
        ];
        $sum = 0;

        for ($i = 0; $i < count($matrix); $i++) {
            if ($matrix[$i][$i] < 0) {
                for ($y = 0; $y < count($matrix[$i]); $y++) {
                    $sum += $matrix[$i][$y];
                }
            }
        }

        $this->printResults($sum);
    }

    public function task10()
    {
        $p = 3;
        $flag = false;

        while (!$flag) {
            $num = rand(100, 999);

            if (is_int($num / $p)) {
                $flag = true;
            }
        }

        $this->printResults($num);
    }

    public function printResults($res)
    {
        print '<pre>';
        print_r($res);
        print '</pre>';
    }
}

$test = new Lab8;
$test->task10();
