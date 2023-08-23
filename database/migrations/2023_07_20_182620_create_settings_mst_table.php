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
        Schema::create('settings_mst', function (Blueprint $table) {
            $table->incrementId();
            $table->string('default_name');
            $table->string('clinic_name');
            $table->text('logo');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('ministry_of_health');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_mst');
    }
};
