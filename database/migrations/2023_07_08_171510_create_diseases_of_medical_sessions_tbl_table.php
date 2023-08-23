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
        Schema::create('diseases_of_medical_sessions_tbl', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('medical_session_id')
                ->nullable();
            $table->string('disease_code', 255);
            $table->string('disease_name', 255);
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
        Schema::dropIfExists('diseases_of_medical_sessions_tbl');
    }
};
