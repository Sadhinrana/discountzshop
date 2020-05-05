<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserbillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userbillings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('country');
            $table->string('address');
            $table->string('city');
            $table->string('division');
            $table->string('zipCode')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('userbillings');
    }
}
