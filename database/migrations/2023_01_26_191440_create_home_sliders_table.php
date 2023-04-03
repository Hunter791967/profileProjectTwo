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
        Schema::create('home_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('panner')->default('amr01.png');
            $table->string('title')->default('This Is Amr Elnahas Portfolio');
            $table->string('sub_title')->default('This Is Amr Elnahas Sub-Portfolio');
            $table->longText('title_desc')->default('This Is Amr Elnahas Portfolio-Description');
            $table->string('btn_text')->default('This Is Button Text');
            $table->string('scetion_video')->default('This Is Amr Elnahas Video');
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
        Schema::dropIfExists('home_sliders');
    }
};
