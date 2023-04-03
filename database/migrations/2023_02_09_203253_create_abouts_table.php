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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('This Is Amr Elnahas About Title');
            $table->string('about_favorite')->default('This Is Amr Elnahas About Favorite');
            $table->string('about_desc')->default('This Is Amr Elnahas About Description');
            $table->string('btn_text')->default('This Is About Button_Text');
            $table->string('image')->nullable();
            $table->longText('about_tab')->default('This Is Amr Elnahas About Tab');
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
        Schema::dropIfExists('abouts');
    }
};
