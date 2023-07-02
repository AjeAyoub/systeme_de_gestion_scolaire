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
            $table->integer('niveau_id');
            $table->integer('classe_id');
            $table->integer('section_id');
            $table->integer('enseignant_id');
            $table->integer('departement_id');
            $table->integer('salle_id');
            $table->string('jour_semaine');
            $table->integer('heure_debut');
            $table->integer('heure_fin');
            $table->timestamps();
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
