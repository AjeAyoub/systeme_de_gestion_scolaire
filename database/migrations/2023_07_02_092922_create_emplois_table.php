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
        Schema::create('emplois', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('niveau_id');
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('enseignant_id');
            $table->unsignedBigInteger('departement_id');
            $table->unsignedBigInteger('salle_id');
            $table->string('jour_semaine');
            $table->integer('heure_debut');
            $table->integer('heure_fin');
            $table->timestamps();

            $table->foreign('niveau_id')->references('id')->on('niveaux')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplois');
    }
};
