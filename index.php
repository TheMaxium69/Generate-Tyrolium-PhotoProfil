<?php

if (!empty($_GET['l'])){
    $letter = $_GET['l'];
} else {
    $letter = "T";
}

if (!empty($_GET['c'])){
    $colorLetter = $_GET['c'];
} else {
    $colorLetter = "1325d7";
}

if (!empty($_GET['b'])){
    $colorBack = $_GET['b'];
} else {
    $colorBack = "FFFFFF";
}

$image = imagecreatetruecolor(1000, 1000);

list($r, $g, $b) = sscanf($colorBack, "%02x%02x%02x");

$background_color = imagecolorallocate($image, $r, $g, $b);

imagefill($image, 0, 0, $background_color);

list($r2, $g2, $b2) = sscanf($colorLetter, "%02x%02x%02x");

$text_color = imagecolorallocate($image, $r2, $g2, $b2);

$font = 'C:\Users\mxmto\Developpement\LocalHost\www\GeneratePP\SMOKIND.otf';
$font_size = 600;
$text_box = imagettfbbox($font_size, 0, $font, $letter);
$text_width = $text_box[2] - $text_box[0];
$text_height = $text_box[7] - $text_box[1];
$x = (imagesx($image) - $text_width) / 2;
$y = (imagesy($image) + $text_height) / 2 + 500;

imagettftext($image, $font_size, 0, $x, $y, $text_color, $font, $letter);

header('Content-Type: image/png');
imagepng($image);

imagedestroy($image);
?>
