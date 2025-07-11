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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_path');
            $table->string('thumbnail_path')->nullable(); // For smaller preview images
            $table->enum('category', ['photoshoot', 'performance', 'behind-scenes', 'event', 'casual', 'group', 'individual'])->default('group');
            $table->json('tags')->nullable(); // For search functionality
            $table->integer('order')->default(0); // For custom ordering
            $table->boolean('is_featured')->default(false); // Featured in main carousel
            $table->boolean('is_active')->default(true);
            $table->date('taken_date')->nullable(); // When photo was taken
            $table->string('photographer')->nullable(); // Photo credit
            $table->json('members_tagged')->nullable(); // Which members are in this photo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};