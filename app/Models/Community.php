<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'badge',
        'description',
        'primary_button',
        'secondary_button',
        'image',
        'program_data',
        'timeline_data',
        'documentation_images',
        'prototype_projects',
        'video_title',
        'video_subtitle',
        'video_image',
        'cta_title',
        'cta_description',
        'cta_primary_button',
        'cta_secondary_button',
        'is_featured',
        'order',
        'status'
    ];

    protected $casts = [
        'program_data' => 'array',
        'timeline_data' => 'array',
        'documentation_images' => 'array',
        'prototype_projects' => 'array',
        'is_featured' => 'boolean'
    ];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at', 'desc');
    }
}
