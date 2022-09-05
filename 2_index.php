<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <?php
   # boolean
   # integer
   # float
   # string
   # array

   $boolTest = 0.0;

   echo "Boolean (0.0): ";
   if (!var_dump((bool) $boolTest)) {
      $integerTest = intval(6 / 4);
      echo "<br><br>Integer, используя intval() - 6/4 = " . $integerTest . " (выводит не двойку, а единицу, так как функция округляет в меньшую сторону)";

      $floatTest = floor((0.7 + 0.1) * 10);
      echo "<br><br>Float - " . $floatTest . ". Выведет семерку, а не 8";

      echo '<br><br>В одинарных кавычках для использования одной одинарной кавычки нужно предварить ее косой чертой - \'';

      $stringTest = "переменные";
      echo "<br><br>Двойные кавычки позволяют явно прописывать в них $stringTest";

      $arr["пятница"] = array("date" => "9", "month" => "сентября", "year" => "2022");
      $arr["суббота"] = array("date" => "10", "month" => "сентября", "year" => "2022");
      $arr["воскресенье"] = array("date" => "11", "month" => "сентября", "year" => "2022");

      $day = "суббота";
      echo "<br><br>Сегодня " . $arr[$day]["date"] . " " . $arr[$day]["month"] . " " . $arr[$day]["year"] . " года";
   }
   ?>
</body>

</html>