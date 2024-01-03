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
        Schema::create('details_of_papers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('laboratory_id');
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
            $table->unsignedBigInteger('enseignant_id');
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade');
            $table->boolean('is_approved_by_enseignant');
            $table->boolean('is_approved_by_director');
            $table->integer('budget');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_of_papers');
    }
};
