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
        Schema::create('game_category_relations', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_juego');
            $table->string('nombre_categoria');
            $table->timestamps();

            $table->foreign('nombre_juego')->references('nombre')->on('games');
            $table->foreign('nombre_categoria')->references('nombre')->on('categories');
            $table->unique(['nombre_juego', 'nombre_categoria']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_category_relations');
    }
};
