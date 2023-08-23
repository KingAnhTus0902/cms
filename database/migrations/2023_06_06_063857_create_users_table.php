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
            $table->incrementId();
            $table->string('name');
            $table->string('email');
            $table->string('username')->nullable();
            $table->string('password');
            $table->status();
            $table->string('description')->nullable();
            $table->char('phone', 13)->nullable();
            $table->string('address')->nullable();
            $table->string('position')->nullable();
            $table->string('certificate')->nullable();
            $table->integer('department_id')->nullable();
            $table->text('avatar')->nullable();
            //$table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('room_id')->nullable();
            //$table->foreign('room_id')->references('id')->on('clinics')->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
