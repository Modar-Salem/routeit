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
        Schema::create('technology_levels', function (Blueprint $table) {
            $table->id();
            $table->enum('level', ['junior', 'mid-level', 'senior']);
            $table->foreignId('technology_id')->constrained('technologies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technology_levels');
    }
};
