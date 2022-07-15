<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Passangers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passangers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('passanger_uuid')->nullable(true)->unique();
            $table->unsignedBigInteger('creater_id')->nullable();
            $table->foreign('creater_id')->references('id')->on('users');
            $table->unsignedBigInteger('passanger_id');
            $table->foreign('passanger_id')->references('id')->on('users');
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
        Schema::dropIfExists('passangers');
    }
}
