<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('speedrun_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('category_id');
            
            $table->string('link_video');
            $table->integer('completion_time_seconds');
            $table->timestamps();

            $table->foreign(['game_id', 'category_id'])->references(['game_id', 'id'])->on('categories')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('speedrun_videos');
    }
};
