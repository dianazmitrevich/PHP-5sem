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
   # однострочный комментарий
   // еще один однострочный комментарий
   /*
      комментарий на пару строчек
   */

   $message = "Привет";
   echo $message;

   $highlight = "чудесный";
   ?>

   <p>Сегодня <span style="color: red;"><?php echo $highlight; ?></span> день</p>
</body>

</html>