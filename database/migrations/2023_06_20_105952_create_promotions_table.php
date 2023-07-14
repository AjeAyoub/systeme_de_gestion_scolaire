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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etudiant_id');
            $table->unsignedBigInteger('niveau_id');
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('vers_niveau_id');
            $table->unsignedBigInteger('vers_classe_id');
            $table->unsignedBigInteger('vers_section_id');
            $table->timestamps();
 
            $table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('niveau_id')->references('id')->on('niveaux')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vers_niveau_id')->references('id')->on('niveaux')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vers_classe_id')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vers_section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
