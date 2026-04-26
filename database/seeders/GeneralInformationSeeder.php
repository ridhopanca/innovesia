<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\GeneralInformation::create([
            'items' => [
                ['svg' => '', 'url' => '#', 'label' => 'Website', 'sublabel' => ''],
                ['svg' => '', 'url' => 'mailto:hello@innovesia.com', 'label' => 'Email', 'sublabel' => ''],
            ],
        ]);
    }
}
