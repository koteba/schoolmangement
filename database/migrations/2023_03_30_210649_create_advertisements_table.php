<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id('advertisement_id');
            $table->string('title');
            $table->string('sub_title');
            $table->string('dec_1')->nullable();
            $table->string('dec_2')->nullable();
            $table->string('dec_3')->nullable();
            $table->string('dec_4')->nullable();
            $table->string('dec_5')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
};
