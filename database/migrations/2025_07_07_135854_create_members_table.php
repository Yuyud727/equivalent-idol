<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_member', function (Blueprint $table) {
            $table->id();
            $table->integer('member_no')->unique();
            $table->string('name');
            $table->string('photo');
            $table->string('color', 7); // Hex color code
            $table->date('birth_date');
            $table->text('jiko');
            $table->timestamps();
            
            // Indexes
            $table->index('member_no');
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_member');
    }
}