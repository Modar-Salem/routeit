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
        Schema::create('roadmap_skill_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roadmap_skill_id')->constrained('roadmap_skills');
            $table->string('title');
            /* nullable temporary */
            $table->string('video')->nullable(); // Assuming this is a file path or URL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roadmap_skill_videos');
    }
};
