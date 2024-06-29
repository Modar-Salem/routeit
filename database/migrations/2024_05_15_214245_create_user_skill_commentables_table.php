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
        Schema::create('user_skill_commentables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_skill_comment_id')->constrained('user_skill_comments')->onDelete('cascade');
            $table->integer('user_skill_commentables_id');
            $table->string('user_skill_commentables_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_skill_commentables');
    }
};
