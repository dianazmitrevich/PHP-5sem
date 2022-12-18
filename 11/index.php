<?php

$character = $_GET['character'] ?? null;
$characters = [
    'tangled',
    'frozen',
    'aristocats',
    'frog',
    'luka',
];

echo '
    <style>body { display: flex; align-items: center; justify-content: center; } .row { display: flex; width: 780px; height: 90vh; } .column { margin-right: 40px; } .column input { display: block; margin-bottom: 5px; width: 300px; } h3 { margin: 0 0 20px 0; }</style>
    <div class="row">
        <div class="column">
';
echo "<form action='index.php' method='get'><select name='character'>";

foreach ($characters as $value) {
    $selected = $value == $character;
    $name = strtoupper($value[0]) . substr($value, 1);

    if ($selected) {
        echo "<option selected value=$value>$name</option>";
    } else {
        echo "<option value=$value>$name</option>";
    }
}

echo "</select><button type='submit'>Выбрать</button></form>";

if (!empty($character)) {
    echo "<img width='400px' height='auto' src='images/$character.jpeg'/>";
}

echo "
        </div>
        <div class='column'>
            <h3>Авторизация в тест</h3>
            <form action='poll.php' method='get'>
                <input type='text' placeholder='ФИО' name='fio' required pattern='^\D+$'></input>
                <input type='mail' placeholder='Email' name='email' required pattern='^\w((\.\w)*\w+)*\w@\w((\.\w)*\w+)*\.\w+$'></input>
                <input type='tel' placeholder='телефон' name='phone' required pattern='^\+[0-9]{2}-[0-9]{2}-[0-9]{2}$'></input>
                <button type='submit'>Войти</button>
            </form>
        </div>
    </div>
";