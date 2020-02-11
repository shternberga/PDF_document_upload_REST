<?php
namespace App\ThumbnailManager;

use Imagick;

class ThumbnailManager implements ThumbnailManagerInterface
{
    public function make(string $uploadsDirectory, string $thumbnailsDirectory, string $fileName): void
    {
        $im = new Imagick($uploadsDirectory.$fileName);
        $im->setIteratorIndex(0);
        $im->setCompression(Imagick::COMPRESSION_JPEG);
        $im->setCompressionQuality(100);
        $im->setImageFormat("jpeg");
        $im->cropImage(650,450, 30,10);
        $im->writeImage($uploadsDirectory.$thumbnailsDirectory.$fileName.".jpg");
    }
}
