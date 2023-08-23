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
        Schema::create('health_insurance_card_head_mst', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('code')->nullable();
            $table->double('discount_right_line');
            $table->double('discount_opposite_line')->nullable();
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
        Schema::dropIfExists('health_insurance_card_head_mst');
    }
};
