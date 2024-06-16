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
        Schema::create('users_followed_experts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobile_user_id')->constrained('mobile_users')->onDelete('cascade');
            $table->foreignId('expert_id')->constrained('experts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_followed_experts');
    }
};
