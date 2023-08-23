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
        Schema::create('vital_signs_tbl', function (Blueprint $table) {
            $table->incrementId();
            $table->integer('medical_session_id');
            $table->foreign('medical_session_id')->references('id')->on('medical_sessions_tbl')->onDelete('cascade');
            $table->float('circuit')->nullable();
            $table->float('temperature')->nullable();
            $table->float('blood_pressure')->nullable();
            $table->float('breathing')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->float('treatment_days')->nullable();
            $table->float('bmi')->nullable();
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
        Schema::dropIfExists('vital_signs_tbl');
    }
};
