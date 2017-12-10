<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor', function (Blueprint $table) {
            $table->increments('id');
            $table->double('pressure');
            $table->double('accelerometer_z');
            $table->double('gyroscope_y');
            $table->double('gyroscope_x');
            $table->double('gyroscope_z');
            $table->double('degrees_y');
            $table->double('temperature');
            $table->double('degrees_r');
            $table->double('degrees_p');
            $table->double('accelerometer_y');
            $table->double('accelerometer_x');
            $table->double('humidity');
            $table->double('compass_x');
            $table->double('compass_y');
            $table->double('compass_z');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor');
    }
}

