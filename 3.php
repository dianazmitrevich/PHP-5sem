<?php

echo -(-45).'<br>';
echo(45 + 45).'<br>';
echo(45 - 45).'<br>';
echo(45 / 5).'<br>';
echo(5 * 9).'<br>';
echo(45 % 2).'<br>';

$var1 = 100;
$var2 = $var1++;
echo 'var1 = '.$var1.', var2 = '.$var2;

$var1 = 100;
$var2 = ++$var1;
echo '<br>var1 = '.$var1.', var2 = '.$var2;

$var1 = '<br>Hello ';
$var1 .= 'World<br>';
echo $var1;
$var1 = 87;
$var1 += 3;
echo $var1;

$var1 = 45;                            // 101101
$var2 = 14;                            // 001110
echo '<br>'.($var1 & $var2).'<br>';    // 001100
echo($var1 | $var2).'<br>';            // 101111
echo(~$var1).'<br>';                   // 101110
echo($var1 << 2).'<br>';             // 10110100
echo($var1 >> 2).'<br>';                 // 1011

var_dump(0 == '0');
var_dump(0 === '0');
var_dump(0 != '0');
var_dump(0 !== '0');
var_dump(2 <> 4);
var_dump(2 > 4);
var_dump(2 > 4);
var_dump(2 <= 4);
var_dump(2 >= 4);

echo '<br>';
var_dump(2 and '');
var_dump(2 or '');
var_dump(2 xor '');
var_dump(!2);
var_dump(2 && '');
var_dump(2 || '');
