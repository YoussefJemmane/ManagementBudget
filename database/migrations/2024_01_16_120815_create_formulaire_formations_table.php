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
        Schema::create('formulaire_formations', function (Blueprint $table) {
            $table->id();
            $table->string('num_jour');
            $table->string('num_person');
            $table->foreignId('entreprise_id')->constrained('entreprises')->cascadeOnDelete();
            $table->enum("validation_centre_analyse", ["pending", "validate","non validate"])->default("pending");
            $table->bigInteger('prix');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulaire_formations');
    }
};
