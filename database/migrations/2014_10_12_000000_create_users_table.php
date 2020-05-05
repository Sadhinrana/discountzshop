<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->tinyInteger('city')->nullable();
            $table->tinyInteger('country')->nullable();
            $table->tinyInteger('division')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('office_email')->nullable();
            $table->string('office_phone')->nullable();
            $table->unsignedInteger('promotional_reward_points')->nullable()->default('0');
            $table->unsignedBigInteger('membership_type_id');
            $table->foreign('membership_type_id')->references('id')->on('membership_types')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
