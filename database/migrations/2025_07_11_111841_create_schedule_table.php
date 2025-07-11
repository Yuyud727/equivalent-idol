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
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->integer('row_number')->unique();
            $table->datetime('event_date');
            $table->string('event_name');
            $table->text('event_description')->nullable();
            $table->string('location');
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->enum('status', ['available', 'live', 'tba', 'cancelled'])->default('available');
            $table->string('event_type')->default('general');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            
            // Indexes
            $table->index(['event_date', 'status']);
            $table->index('row_number');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule');
    }
};