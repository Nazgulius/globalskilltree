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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_class_id')->constrained('game_classes')->onDelete('cascade');
            $table->string('name'); 
            $table->text('description')->nullable();
            $table->json('effects')->nullable(); // эффекты навыка
            $table->json('dependencies')->nullable(); // эффекты навыка
            $table->json('dependent')->nullable(); // эффекты навыка
            $table->integer('max_level'); // эффекты навыка
            $table->timestamps();

            $table->index(['game_class_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
