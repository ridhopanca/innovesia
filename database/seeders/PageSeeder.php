<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')->insert([
            [
                'title' => 'Home',
                'template' => 'home',
                'slug' => 'home',
                'status' => 'draft',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'About',
                'template' => 'about',
                'slug' => 'about',
                'status' => 'draft',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Product',
                'template' => 'product',
                'slug' => 'product',
                'status' => 'draft',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Portfolio',
                'template' => 'portfolio',
                'slug' => 'portfolio',
                'status' => 'draft',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Articles',
                'template' => 'article',
                'slug' => 'articles',
                'status' => 'draft',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Community',
                'template' => 'community',
                'slug' => 'community',
                'status' => 'draft',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Our Work',
                'template' => 'our-work',
                'slug' => 'our-work',
                'status' => 'draft',
                'parent_id' => 1, // Child of Home
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Strategic Capabilities',
                'template' => 'strategic-capabilities',
                'slug' => 'strategic-capabilities',
                'status' => 'draft',
                'parent_id' => 1, // Child of Home
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Collective Structure',
                'template' => 'collective-structure',
                'slug' => 'collective-structure',
                'status' => 'draft',
                'parent_id' => 2, // Child of About
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
