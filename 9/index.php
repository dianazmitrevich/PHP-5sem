<?php

require_once 'header.php';
session_start();
$_SESSION['name'] = 'Диана Змитревич';

if (isset($_POST['close-session'])) {
    session_destroy();
}
?>

<div class="container">
    <div class="session">
        <div class="session__name"><?php echo $_SESSION['name'] ?? 'Сессия еще не открыта'; ?></div>
        <div class="session__buttons">
            <form action="" method="post">
                <button type="submit" class="btn btn-danger" name="close-session">Закрыть сессию</button>
            </form>
        </div>
    </div>

    <div class="tasks">
        <a href="9-task1.php" class="btn btn-warning" name="task1">Задача 1</a>
        <a href="9-task2.php" class="btn btn-warning" name="task2">Задача 2</a>
        <a href="9-task3.php" class="btn btn-warning" name="task3">Задача 3</a>
        <a href="9-task4.php" class="btn btn-warning" name="task4">Задача 4</a>
    </div>
</div>

<?php
require_once 'footer.php';
?>
