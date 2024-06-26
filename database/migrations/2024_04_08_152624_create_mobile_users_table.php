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
        Schema::create('mobile_users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('verify')->default(false);
            $table->boolean('completed')->default(false);
            $table->string('name');
            $table->string('image')->nullable();
            $table->date('birth_date')->nullable();
            $table->boolean('it_student')->nullable();
            $table->string('university')->nullable();
            $table->text('bio')->nullable();
            $table->enum('type' , ['normal' , 'blocked'])->default('normal') ;
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_users');
    }
};
