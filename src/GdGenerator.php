<?php
/**
 * Created by PhpStorm.
 * User: Guest User
 * Date: 06.08.2017
 * Time: 0:35
 */

class GdGenerator
{
    public function generate($ratingText)
    {
        $image = imagecreatetruecolor(310, 210);
        $backColor = imagecolorallocate($image, 242, 120, 75);
        $textColor = imagecolorallocate($image, 64, 64, 64);
        $fontFile = __DIR__ . '/assets/OpenSans-Bold.ttf';
        $inBox = imagecreatefrompng(__DIR__ . '/assets/picture_for_rating.png');
        imagefill($image, 0, 0, $backColor);
        imagecopy($image, $inBox, 5, 5, 0, 0, 300,200);
        imagettftext($image, 12, 0, 15, 110, $textColor, $fontFile, $ratingText);
        imagepng($image);
        imagedestroy($image);
    }
}