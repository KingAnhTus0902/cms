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
        Schema::create('district', function (Blueprint $table) {
            $table->incrementId();
            $table->string('name')->nullable();
            $table->integer('city_id');
            $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade');
            $table->tinyInteger('type')->comment('1: District, 2: Commune, 3: Wards, 4: City');
            $table->string('name_with_type')->nullable();
            $table->string('slug')->nullable();
            $table->coordinates();
            $table->order();
            $table->status();
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
        Schema::dropIfExists('district');
    }
};
