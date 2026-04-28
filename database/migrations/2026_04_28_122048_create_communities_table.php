<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('badge')->nullable();
            $table->text('description')->nullable();
            $table->string('primary_button')->nullable();
            $table->string('secondary_button')->nullable();
            $table->string('image')->nullable();
            $table->json('program_data')->nullable();
            $table->json('timeline_data')->nullable();
            $table->json('documentation_images')->nullable();
            $table->json('prototype_projects')->nullable();
            $table->string('video_title')->nullable();
            $table->string('video_subtitle')->nullable();
            $table->string('video_image')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_primary_button')->nullable();
            $table->string('cta_secondary_button')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->string('status')->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communities');
    }
};
