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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->string("titre");
            $table->string("type_service");
            $table->enum("status", ["doctorant", "enseignant"])->default("doctorant");
            $table->string("intitule_article")->nullable();
            $table->string("intitule_journal")->nullable();
            $table->string("ISSN")->nullable();
            $table->string("base_donnee_indexation")->nullable();
            $table->string("qualite_article")->nullable();
            $table->string("frais_service")->nullable();
            $table->foreignId("laboratory_id")->constrained("laboratories")->cascadeOnDelete();
            $table->enum("execution_service", ["pending", "execute","non excecute"])->default("non excecute");
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
        Schema::dropIfExists('services');
    }
};
