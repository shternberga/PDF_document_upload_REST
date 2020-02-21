<?php
namespace App\ThumbnailManager;

interface ThumbnailManagerInterface{

    public function make(string $fileLocation): string;

}
