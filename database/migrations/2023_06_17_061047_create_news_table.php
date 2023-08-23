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
        Schema::create('news_tbl', function (Blueprint $table) {
            $table->incrementId();
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->integer('category')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('content');
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
        Schema::dropIfExists('news_tbl');
    }
};
