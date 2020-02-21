<?php
namespace App\ThumbnailManager;

use Imagick;

class ImagickThumbnailManager implements ThumbnailManagerInterface
{
    public function make(string $fileLocation): string
    {
        $im = new Imagick($fileLocation);
        $im->setIteratorIndex(0);
        $im->setCompression(Imagick::COMPRESSION_JPEG);
        $im->setCompressionQuality(100);
        $im->setImageFormat("jpeg");
        $im->cropImage(650,450, 30,10);
        $im->writeImage($fileLocation."_thumbnail.jpg");

        return $fileLocation."_thumbnail.jpg";
    }
}
