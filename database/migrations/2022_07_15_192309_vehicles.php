<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vehicle_uuid')->nullable(true)->unique();
            $table->unsignedBigInteger('creater_id')->nullable();
            $table->foreign('creater_id')->references('id')->on('users');
            $table->string('name');
            $table->string('model');
            $table->string('brand');
            $table->string('vehicle_no')->unique();
            $table->string('color');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('vehicles');
    }
}
