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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('game_id')->constrained('games')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            

            $table->string('link_video');
            $table->integer('completion_time_seconds');
            $table->timestamps();



            //$table->string('username');
            //$table->string('game_name');
            //$table->string('category_name');

            //$table->foreign('username')->references('name')->on('users');
            //$table->foreign(['game_name', 'category_name'])->references(['game_name', 'category_name'])->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
