<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('New User');
            $table->string('surename')->nullable();
            $table->string('phonenumber')->unique();


            $table->string('otp')->nullable();
            $table->dateTime('otp_expiry')->nullable();
            $table->dateTime('login_expiry')->nullable();

            $table->string('email')->unique()->nullable();

            $table->unsignedBigInteger('coach_id')->nullable();
            $table->foreign('coach_id')->references('id')->on('coachs')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
