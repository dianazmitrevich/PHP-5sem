<?php

class Lab10 {
    public function checkEmail($email) {
        if (preg_match('/^\w((\.\w)*\w+)*\w@\w((\.\w)*\w+)*\.\w+$/', $email)) {
            echo $email . ' прошел проверку';
        }
    }

    public function checkPassword($password) {
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)\w{8,}$/', $password)) {
            echo $password . ' прошел проверку';
        }
    }

    public function checkBrackets($text) {
        if (!preg_match('/(\)([A-Za-z\d!@#]+)*\)+)|(\(([A-Za-z\d!@#]+)*\(+)/', $text)) {
            echo $text . ' прошел проверку';
        }
    }

    public function replaceWord() {
        $text = 'Понятие функции – одно из основных в математике. На уроках математики вы часто слышите это слово.
        Вы строите графики функций, занимаетесь исследованием функции, находите наибольшее или наименьшее значение функции.
        Но для понимания всех этих действий давайте определим, что такое функция. Определение функции можно дать несколькими
        способами. Все они будут дополнять друг друга. 1. Функция – это зависимость одной переменной величины от другой.
        Другими словами, взаимосвязь между величинами. Можно дать и другое определение. Функция – это определенное действие над переменной';

        echo preg_replace('/[Фф](ункци)./u', '<mark>${0}</mark>', $text);
    }

    public function censorWord($searchFor, $changeTo, $phrase) {
        $regex = '/' . $searchFor[0];
        
        for ($i = 1; $i < strlen($searchFor); $i++) {
            $regex .= '(\s)*' . $searchFor[$i];
        }
        
        $regex = str_replace('a', '[aа]', $regex) . '/iu';

        echo preg_replace($regex, $changeTo, $phrase);
    }
}

$test = new Lab10;
// $test->checkEmail('test@test.test');
// $test->checkPassword('DDDDD1DbmjDDD');
// $test->checkBrackets('fds()dfsdf(fsf)fdsf(321d@sds)');
// $test->replaceWord();
// $test->censorWord('left', 'right', 'you are l Eft');