<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'slug', 'status', 'template'];

    public function sections()
    {
        return $this->hasMany(Section::class)->orderBy('order');
    }
}
