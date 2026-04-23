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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'About',
                'template' => 'about',
                'slug' => 'about',
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Product',
                'template' => 'product',
                'slug' => 'product',
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Portfolio',
                'template' => 'portfolio',
                'slug' => 'portfolio',
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Articles',
                'template' => 'article',
                'slug' => 'articles',
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Community',
                'template' => 'community',
                'slug' => 'community',
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
