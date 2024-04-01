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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cin');
            $table->string('phone');
            $table->string('etablissement')->nullable();
            $table->string('cne')->nullable();
            $table->date('date_inscription')->nullable();
            $table->string('entreprise')->nullable();
            $table->string('encadrant')->nullable();
            $table->foreignId('laboratory_id')->nullable()->constrained('laboratories')->cascadeOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
