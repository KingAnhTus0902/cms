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
        Schema::create('hospital_transfers_tbl', function (Blueprint $table) {
            $table->incrementId();
            $table->integer('medical_sessions_id');
            $table->integer('cadre_id');
            $table->integer('cadre_age');
            $table->string('cadre_work_place', 255)->nullable();
            $table->string('medical_insurance_number',15)->nullable();
            $table->date('medical_insurance_start_date')->nullable();
            $table->date('medical_insurance_end_date')->nullable();
            $table->integer('hospital_id');
            $table->date('treatment_start_date');
            $table->date('treatment_end_date');
            $table->string('clinical_signs', 500);
            $table->string('subclinical_results', 500);
            $table->string('diagnose', 500);
            $table->string('treatment_methods', 500);
            $table->string('patient_status', 500);
            $table->integer('reasons')->comment(
                '1.  Đủ điều kiện chuyển tuyến.
                         2. Theo yêu cầu của người bệnh hoặc người đại diện hợp pháp của người bệnh.'
            );
            $table->string('treatment_directions',500);
            $table->date('transit_times');
            $table->string('transportations', 500);
            $table->string('escort_information', 500);
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
        Schema::dropIfExists('hospital_transfers_tbl');
    }
};
