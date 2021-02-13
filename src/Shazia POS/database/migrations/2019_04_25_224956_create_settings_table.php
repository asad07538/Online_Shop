<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('Parvi computer');
            $table->string('address')->default('New Bazar Skardu');
            $table->string('email')->default('parvi.computer@gmail.com');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('logo')->default('logo.png');
            $table->string('city')->default('Skardu');
            $table->string('country')->default('Pakistan');
         
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
        Schema::dropIfExists('settings');
    }
}
