<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// 1
class Student {
    public $name;
    public $age;
    public $group;
}

$ivan = new Student;
$ivan->name = 'Иван';
$ivan->age = 19;
$ivan->group = 'группа 3';

$vasya = new Student;
$vasya->name = 'Вася';
$vasya->age = 20;
$vasya->group = 'группа 4';

echo 'Иван - ' . $ivan->group . ', Вася - ' . $vasya->group . '<br>';
echo 'Сумма возрастов - ' . ($ivan->age + $vasya->age);

// 2
// class Student {
//     private $name;
//     private $age;
//     private $group;

//     public function __construct($name, $age, $group) {
//         $this->name = $name;
//         $this->age = $age;
//         $this->group = $group;
//     }

//     public function setName($name) {
//         $this->name = $name;
//     }
//     public function setAge($age) {
//         if ($this->checkAge($age)) {
//             $this->age = $age;
//         }
//     }
//     public function setGroup($group) {
//         $this->group = $group;
//     }
//     public function getName() {
//         return $this->name;
//     }
//     public function getAge() {
//         return $this->age;
//     }
//     public function getGroup() {
//         return $this->group;
//     }

//     private function checkAge() {
//         if ($age < 0 && $age > 100) {
//             return false;
//         }

//         return true;
//     }
// }

// $ivan = new Student;
// $ivan->setName('Иван');
// $ivan->setAge(19);
// $ivan->setGroup('группа 3');

// $ivan = new Student('Иван', 19, 'группа 3');
// $vasya = new Student('Вася', 20, 'группа 4');

// echo 'Группы Ивана и Васи - ' . $ivan->getGroup() . ', ' . $vasya->getGroup() . '<br>';
// echo 'Сумма возрастов - ' . ($ivan->getAge() + $vasya->getAge());

// 3
// class User {
//     protected $name;
//     protected $age;
    
//     public function setName($name) {
//         $this->name = $name;
//     }
//     public function getName() {
//         return $this->name;
//     }
//     public function setAge($age) {
//         $this->age = $age;
//     }
//     public function getAge() {
//         return $this->age;
//     }
// }

// class Worker extends User {
//     private $salary;

//     public function setSalary($salary) {
//         $this->salary = $salary;
//     }
//     public function getSalary() {
//         return $this->salary;
//     }
// }

// class Student extends User {
//     private $scholarship;
//     private $year;

//     public function setScholarship($scholarship) {
//         $this->scholarship = $scholarship;
//     }
//     public function getScholarship() {
//         return $this->scholarship;
//     }
//     public function setYear($year) {
//         $this->year = $year;
//     }
//     public function getYear() {
//         return $this->year;
//     }
// }

// class Driver extends Worker {
//     private $experience;
//     private $category;

//     public function setExperience($experience) {
//         $this->experience = $experience;
//     }
//     public function getExperience() {
//          return $this->experience;
//      }
//      public function setCategory($category) {
//          $this->category = $category;
//      }
//      public function getCategory() {
//          return $this->category;
//      }
// }

// $ivan = new Worker;
// $ivan->setName('Иван');
// $ivan->setAge(25);
// $ivan->setSalary(1000);

// $vasya = new Worker;
// $vasya->setName('Вася');
// $vasya->setAge(26);
// $vasya->setSalary(2000);

// echo 'Сумма зарплата Ивана и Васи - ' . ($ivan->getSalary() + $vasya->getSalary()) . '<br>';