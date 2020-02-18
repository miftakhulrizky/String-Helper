<?php

    session_start();
    $random_alpha = md5(rand());
    $captca_code = substr($random_alpha, 0, 6);
    $_SESSION['captcha_code'] = $captca_code;
    header('Content-Type: image/png');
    $image = imagecreatetruecolor(200, 32);
    $background_color = imagecolorallocate($image, 231, 100, 18);
    $text_color = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 0, 0, 200, 38, $background_color);
    $font = dirname(__FILE__) . '/arial.ttf';
    imagettftext($image, 15, 0, 70, 23, $text_color, $font, $captca_code);
    imagepng($image);
    imagedestroy($image);
?>
