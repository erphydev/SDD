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
            $table->string('name');
            $table->string('surename');
            $table->string('phonenumber')->unique();
            $table->string('otp');
            $table->date('otp_expiry');
            $table->date('login_expiry');
            $table->string('email')->unique();
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
