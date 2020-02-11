<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * @property int|string|null file
*/
class Document extends Model
{
    public $fillable = ['file'];
}
