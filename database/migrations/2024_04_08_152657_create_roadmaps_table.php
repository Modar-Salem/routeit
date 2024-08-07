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
        Schema::create('roadmaps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expert_id')->constrained('experts')->onDelete('cascade');
            $table->foreignId('technology_level_id')->constrained('technology_levels')->onDelete('cascade');
            $table->string('title');
            $table->string('title_ar');
            $table->text('description');
            $table->text('description_ar');
            $table->string('cover');
            /* nullable temporary */
            $table->string('introductory_video')->nullable();
            $table->string('target_cv')->nullable(); //file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roadmaps');
    }
};
