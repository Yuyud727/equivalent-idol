<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('stage_name')->nullable();
            $table->string('position'); // Leader, Main Vocal, etc
            $table->date('birth_date');
            $table->string('nationality')->default('Indonesia');
            $table->text('bio')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('color_theme')->nullable(); // untuk member color
            $table->integer('order')->default(0); // urutan member
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};