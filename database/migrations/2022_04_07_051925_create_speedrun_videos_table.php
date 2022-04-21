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
        Schema::create('speedrun_videos', function (Blueprint $table) {
            $table->id();
            $table->string('link_video');
            $table->float('completion_time_minutes');
            $table->string('username');
            $table->string('game_name');
            $table->string('category_name');
            $table->timestamps();

            $table->foreign('username')->references('name')->on('users');
            $table->foreign(['game_name', 'category_name'])->references(['game_name', 'category_name'])->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('speedrun_videos');
    }
};
