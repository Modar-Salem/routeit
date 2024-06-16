<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skill_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobile_user_id')->constrained('mobile_users');
            $table->foreignId('roadmap_skill_id')->constrained('roadmap_skills');
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_comments');
    }
};