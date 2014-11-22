<?php
$im = imagecreatetruecolor(100, 100)
    or die("Невозможно создать поток изображения");
imagettftext($im, 20, 50, 50, 0, imagecolorallocate($im, 128, 128, 128), "fonts/arial.ttf", 'R');
imagepng($im, "img.png");
imagedestroy($im);
