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
        Schema::create('resultats', function (Blueprint $table) {
            $table->id();
            $table->integer('etudiant_id');
            $table->integer('matiere_id');
            $table->decimal('note_matiere', 8, 2);
            $table->decimal('note_examen', 8, 2);
            $table->decimal('note_finale', 8, 2);
            $table->string('statut');
            $table->string('option');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultats');
    }
};
