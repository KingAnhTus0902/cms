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
        Schema::create('city', function (Blueprint $table) {
            $table->incrementId();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->integer('region')->nullable()->comment('1: Mien Bac, 2: Mien Trung, 3: Mien Nam');
            $table->tinyInteger('type')->comment('1: Province, 2: City');
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
        Schema::dropIfExists('city');
    }
};
