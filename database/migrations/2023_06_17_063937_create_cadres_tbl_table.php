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
        Schema::create('cadres_tbl', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->char('code', 6)->comment('code = "CB" + id (4 ký tự)');
            $table->string('name', 255);
            $table->string('password', 100);
            $table->string('identity_card_number', 12);
            $table->char('medical_insurance_number', 15)->nullable();
            $table->date('medical_insurance_start_date')->nullable();
            $table->date('medical_insurance_end_date')->nullable();
            $table->date('birthday')->nullable();
            $table->tinyInteger('gender')->default('0')->comment('0: Nam, 1: Nữ');
            $table->integer('folk_id')->default(1)->comment('id dân tộc');
            $table->integer('city_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('phone', 12)->nullable();
            $table->string('job', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('address', 255)->nullable();
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
        Schema::dropIfExists('cadres_tbl');
    }
};
