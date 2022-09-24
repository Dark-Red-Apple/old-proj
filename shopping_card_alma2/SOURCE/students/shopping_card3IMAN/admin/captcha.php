<?php
session_start();
$string = '';

for ($i = 0; $i < 5; $i++) {
    // this numbers refer to numbers of the ascii table (lower case) . numbers 0- 9 : 48-57 | A-Z: 65-90 | a-z: 97-122
    $string .= chr(rand(97, 122));
}

$_SESSION['rand_code'] = $string;

$dir = '../template/template1/fonts/';

$image = imagecreatetruecolor(150, 60);
$black = imagecolorallocate($image, 0, 0, 0);
$color = imagecolorallocate($image, 200, 100, 90); // red
$white = imagecolorallocate($image, 255, 255, 255);
$gray = imagecolorallocate($image, 220, 220, 220);

imagefilledrectangle($image, 0, 0, 150, 60, $gray);

$pixel_color = imagecolorallocate($image, 0, 0, 0);
for ($i = 0; $i < 1000; $i++) {
    imagesetpixel($image, rand() % 200, rand() % 100, $pixel_color);
}


$line_color = imagecolorallocate($image, 64, 64, 64);
for ($i = 0; $i < 10; $i++) {
    imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);
}

//imagettftext($image, $font_size, $angle, $x, $y, $color ,$font_file ,$text);
$x = 10;

for ($i = 0; $i <= 4; $i++) {
    imagettftext($image, 30, rand(-15, 15), $x, rand(30, 50), $black, $dir . "arial.ttf", $string[$i]);
    $x += 17;
}
header("Content-type: image/png");
imagepng($image);
