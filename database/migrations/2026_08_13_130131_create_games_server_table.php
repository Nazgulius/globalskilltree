<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games_server', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->onDelete('cascade'); // связь с games
            $table->string('name_server', 100);                               // название сервера
            $table->string('link_server', 255)->nullable();                   // ссылка на сервер
            $table->integer('max_lvl')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index(['game_id', 'name_server']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games_server');
    }
};
