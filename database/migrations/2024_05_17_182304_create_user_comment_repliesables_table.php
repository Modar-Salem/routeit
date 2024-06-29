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
        Schema::create('user_comment_repliesables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_comment_reply_id')->constrained('user_comment_replies')->onDelete('cascade');
            $table->integer('user_comment_repliesables_id');
            $table->string('user_comment_repliesables_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_comment_repliesables');
    }
};
