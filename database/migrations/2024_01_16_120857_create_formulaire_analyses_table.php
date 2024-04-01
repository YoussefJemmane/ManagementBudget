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
        Schema::create('formulaire_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->string("designantion");
            $table->text("description");
            $table->string("mode_facturation");
            $table->bigInteger("prix_unitaire");
            $table->bigInteger("quantite");
            $table->bigInteger("prix_total");
            $table->foreignId("laboratory_id")->constrained("laboratories")->cascadeOnDelete()->nullable();
            $table->enum("validation_centre_analyse", ["pending", "validate","non validate"])->default("pending");
            $table->enum("validation_directeur_labo", ["pending", "validate","non validate"])->default("pending");
            $table->enum("validation_enseignant", ["pending", "validate","non validate"])->default("pending");
            $table->enum("execution_analyse", ["pending", "execute","non excecute"])->default("non excecute");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulaire_analyses');
    }
};
