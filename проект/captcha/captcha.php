<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
$width = 172;
$height = 78;
$font = __DIR__.'/Gasalt.ttf';
$fontsize = 20;
$caplen = 6;

header('Content-type: image/png');
$im = imagecreatetruecolor($width, $height);
imagesavealpha($im, true);
$bg = imagecolorallocatealpha($im, 0, 0, 0, 127);
imagefill($im, 0, 0, $bg);

$img_arr = array('b-1.png', 'b-2.png');
$img_fn = $img_arr[rand(0, sizeof($img_arr)-1)];
$im = imagecreatefrompng('./background/' . $img_fn);

$linenum = rand(3, 5);
for ($i = 0; $i < $linenum; $i++) {
    $color = imagecolorallocate($im, rand(0, 255), rand(0, 200), rand(0, 255)); imageline($im, rand(0, 10), rand(1, 72), rand(162, 172), rand(1, 72), $color);
}

$captcha = '';
for ($i = 0; $i < $caplen; $i++) {
    $captcha .= $letters[rand(0, count($letters) - 1)];
    $x = ($width - 20) / $caplen * $i + 10;
    $x = rand($x, $x + 4);
    $y = $height - ( ($height - $fontsize) / 2 );
    $curcolor = imagecolorallocate( $im, rand(0, 100), rand(0, 100), rand(0, 100) );
    $angle = rand(-25, 25);
    imagettftext($im, $fontsize, $angle, $x, $y, $curcolor, $font, $captcha[$i]);
}

$linenum = rand(3, 7);
for ($i = 0; $i < $linenum; $i++) {
    $color = imagecolorallocate($im, rand(0, 255), rand(0, 200), rand(0, 255)); imageline($im, rand(0, 10), rand(1, 72), rand(162, 172), rand(1, 72), $color);
}

session_start();
$_SESSION['captcha'] = $captcha;
imagepng($im);
imagedestroy($im);