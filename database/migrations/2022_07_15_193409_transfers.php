<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transfers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transfer_uuid')->nullable(true)->unique();
            $table->unsignedBigInteger('creater_id')->nullable();
            $table->foreign('creater_id')->references('id')->on('users');
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('users');
            $table->unsignedBigInteger('passanger_id');
            $table->foreign('passanger_id')->references('id')->on('users');
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->string('starting_point')->nullable(true);
            $table->string('ending_point')->nullable(true);
            $table->enum('status', ['pending', 'active', 'completed','canceled'])->default('pending');
            $table->time('departure_time');
            $table->time('end_time')->nullable();;
            $table->timestamp('departure_date')->nullable();
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
        Schema::dropIfExists('transfers');
    }
}
