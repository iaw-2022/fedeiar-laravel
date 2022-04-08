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
            $table->string('nombre_juego');
            $table->string('nombre_categoria');
            $table->timestamps();

            $table->foreign('username')->references('username')->on('users');
            $table->foreign(['nombre_juego', 'nombre_categoria'])->references(['nombre_juego', 'nombre_categoria'])->on('game_category_relations');
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
