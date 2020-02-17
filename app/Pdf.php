<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $fillable = [
        'name',
        'pdf_location',
        'thumbnail_location',
        'size'
    ];
}
