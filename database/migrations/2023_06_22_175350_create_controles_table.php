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
        Schema::create('controles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('enseignant_id');
            $table->unsignedBigInteger('niveau_id');
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('section_id');
            $table->timestamps();

            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('niveau_id')->references('id')->on('niveaux')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controles');
    }
};
