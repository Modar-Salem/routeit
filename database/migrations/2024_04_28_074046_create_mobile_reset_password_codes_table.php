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
        Schema::create('mobile_reset_password_codes', function (Blueprint $table) {
            $table->id();
            $table->integer('resetPasswordCode')->default(null);
            $table->foreignId('user_id')->constrained('mobile_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_reset_password_codes');
    }
};
