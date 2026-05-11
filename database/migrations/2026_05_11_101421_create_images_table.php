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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_class_id')->constrained('game_classes')->onDelete('cascade');
            $table->string('path', 500);
            $table->enum('type', ['main', 'preview', 'screenshot', 'icon'])->default('main');
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index(['game_class_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
