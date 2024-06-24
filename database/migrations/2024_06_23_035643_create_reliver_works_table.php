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
        Schema::create('reliver_works', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reliver_id');
            $table->integer('radar_1')->nullable();
            $table->integer('radar_2')->nullable();
            $table->integer('radar_3')->nullable();
            $table->integer('radar_4')->nullable();

            $table->integer('blaster_1')->nullable();
            $table->integer('blaster_2')->nullable();
            $table->integer('blaster_3')->nullable();
            $table->integer('blaster_4')->nullable();
            $table->integer('blaster_5')->nullable();
            $table->integer('blaster_6')->nullable();
            $table->integer('blaster_7')->nullable();
            $table->integer('blaster_8')->nullable();
            $table->integer('pressure_1')->nullable();
            $table->integer('pressure_2')->nullable();
            $table->integer('pressure_3')->nullable();
            $table->integer('pressure_4')->nullable();
            $table->integer('pressure_5')->nullable();
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
        Schema::dropIfExists('reliver_works');
    }
};
