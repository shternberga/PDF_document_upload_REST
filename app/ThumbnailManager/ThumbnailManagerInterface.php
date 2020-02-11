<?php
namespace App\ThumbnailManager;

interface ThumbnailManagerInterface{

    public function make(string $uploadsDirectory, string $thumbnailsDirectory, string $fileName): void;

}
