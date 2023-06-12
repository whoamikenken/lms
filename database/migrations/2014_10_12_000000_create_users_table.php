<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('student_no')->nullable();
            $table->string('email')->unique();
            $table->string('contact_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('course')->nullable();
            $table->string('year')->nullable();
            $table->string('section')->nullable();
            $table->string('password')->nullable();
            $table->boolean('isRemove')->default(false);
            $table->boolean('isTakeLearningStyle')->default(false);
            $table->string('ls_result')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
};
