<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
///**
// * @property int|string|null location
// * @property int|string|null thumbnail_location
// * @property int|string|null file
//*/
class Document extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'location', 'thumbnail_location', 'file'];
}
