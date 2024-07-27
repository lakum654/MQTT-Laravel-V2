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
        Schema::create('notification_settings', function (Blueprint $table) {
            $table->id();
            $table->string('reliver_id')->nullable();
            $table->float('pressure1')->nullable();
            $table->float('pressure2')->nullable();
            $table->float('pressure3')->nullable();
            $table->float('radar1')->nullable();
            $table->float('radar2')->nullable();
            $table->float('blasterA1')->nullable();
            $table->float('blasterB1')->nullable();
            $table->float('blasterC2')->nullable();
            $table->float('blasterD2')->nullable();
            $table->float('temperature')->nullable();
            $table->boolean('is_on')->default(false);
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
        Schema::dropIfExists('notification_settings');
    }
};
