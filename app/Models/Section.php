<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'page_id',
        'type',
        'order',
        'content',
        'draft_content',
        'page_template',
        'is_visible'
    ];

    protected $casts = [
        'content' => 'array',
        'draft_content' => 'array',
        'is_visible' => 'boolean',
    ];
}
