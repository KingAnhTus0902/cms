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
        Schema::create('materials_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 8);
            $table->string('name', 255);
            $table->string('mapping_name', 255)->nullable();
            $table->string('active_ingredient_name', 255)->nullable();
            $table->string('content', 255)->nullable();
            $table->string('dosage_form', 255)->nullable();
            $table->integer('material_type_id')->nullable();
            $table->string('ingredients', 255)->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('service_unit_price')->default(0);
            $table->tinyInteger('use_insurance')->default(0)->comment('0: Không thanh toán BH, 1: Thanh toán BH');
            $table->string('insurance_code', 25)->nullable();
            $table->integer('insurance_unit_price')->default(0);
            $table->string('disease_type', 255)->nullable();
            $table->text('usage')->nullable();
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
        Schema::dropIfExists('materials_tbl');
    }
};
