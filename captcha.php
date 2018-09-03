<?php
session_start();
$my_img = imagecreate( 173, 30 );
$background = imagecolorallocate( $my_img, 0, 0, 200 );
$text_colour = imagecolorallocate( $my_img, 255, 255, 0 );
$captcha_num='ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrsturvwxyz';
$captcha_num=substr(str_shuffle($captcha_num),0,6);
$_SESSION['code']=$captcha_num;
imagestring($my_img, 4, 50, 0, $captcha_num, $text_colour );
imagesetthickness($my_img,5);
header("Content-type: image/png");
imagepng($my_img);
imagecolordeallocate($text_color);
imagecolordeallocate( $background );
imagedestroy($my_img);
?>