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
        Schema::create('builds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('game_id')->nullable()->constrained('games')->onDelete('set null');
            $table->string('name'); 
            $table->string('class')->default('Novice');
            $table->integer('recommended_level')->nullable();
            $table->text('description_mini')->nullable();
            $table->text('strengths_and_weaknesses')->nullable();
            $table->text('characteristics')->nullable();
            $table->text('equipment')->nullable();
            $table->json('skills')->nullable(); 
            $table->text('description')->nullable();
            $table->text('video')->nullable();
            $table->json('items')->nullable(); 
            $table->boolean('is_published')->default(false);
            $table->timestamps();
            
            $table->index('user_id');
            $table->index('is_published');
            $table->index('game_id'); 
            $table->index('recommended_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('builds');
    }
};
