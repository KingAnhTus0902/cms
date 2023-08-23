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
        Schema::create('materials_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 20);
            $table->string('name', 255);
            $table->integer('type')->comment('1: Vật tư, 2: Thuốc')->default(1);
            $table->string('note', 255)->nullable();
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
        Schema::dropIfExists('materials_types');
    }
};
