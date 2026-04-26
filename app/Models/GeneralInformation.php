<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralInformation extends Model
{
    protected $fillable = ['items'];

    protected $casts = [
        'items' => 'array',
    ];
}
