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
            $table->boolean("validation_directeur_these")->default(false);
            $table->boolean("validation_centre_appui")->default(false);
            $table->boolean("validation_directeur_laboartoire")->default(false);
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
