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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_class_id')->constrained('game_classes')->onDelete('cascade');
            $table->string('name');
            $table->string('type'); // оружие, броня, аксессуар и т. д.
            $table->string('type_class'); // меч, топор, посох, броня тело, броня ноги и т. д.
            $table->text('description')->nullable();
            $table->json('stats')->nullable(); // характеристики предмета
            $table->integer('required_level')->default(1);
            $table->string('required_class')->default('all');
            $table->string('required_class_rang')->default('all');
            $table->timestamps();

            $table->index(['game_class_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
