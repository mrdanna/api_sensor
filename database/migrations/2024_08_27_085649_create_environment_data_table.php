<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironmentDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_data', function (Blueprint $table) {
            $table->id();
            $table->string('sensor_name');
            $table->float('pollution_level')->nullable(); // Pencemaran udara
            $table->float('temperature')->nullable(); // Suhu
            $table->float('water_quality')->nullable(); // Kualitas air
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
        Schema::dropIfExists('environment_data');
    }
}
