<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\GeneralInformation;

class FixGeneralInfoTableSeeder extends Seeder
{
    public function run(): void
    {
        if (!Schema::hasTable('general_information')) {
            Schema::create('general_information', function (Blueprint $table) {
                $table->id();
                $table->json('items');
                $table->timestamps();
            });
            
            // Insert default empty record
            GeneralInformation::create([
                'items' => json_encode([])
            ]);
            
            echo "Table general_information created with default data!\n";
        } else {
            echo "Table general_information already exists.\n";
        }
    }
}
