<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'slug', 'status', 'template', 'parent_id'];

    public function sections()
    {
        return $this->hasMany(Section::class)->orderBy('order');
    }

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id')->orderBy('title');
    }

    public function isDetailPage()
    {
        return $this->parent_id !== null;
    }
}
