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
        Schema::create('formulaire_revisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->string("nom");
            $table->string("statut");
            $table->string("phone");
            $table->date("date_inscription")->nullable();
            $table->string("etablissement");
            $table->string("laboratoire");
            $table->string("directeur_these");
            $table->string("phone_directeur_these");
            $table->bigInteger("frais_du_service")->default(1640);
            $table->enum("validation_centre_appui", ["pending", "validate","non validate"])->default("pending");
            $table->enum("validation_directeur_labo", ["pending", "validate","non validate"])->default("pending");
            $table->enum("validation_enseignant", ["pending", "validate","non validate"])->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulaire_revisions');
    }
};
