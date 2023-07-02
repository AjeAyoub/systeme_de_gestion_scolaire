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
            $table->integer('etudiant_id');
            $table->integer('niveau_id');
            $table->integer('classe_id');
            $table->integer('section_id');
            $table->integer('annee_scolaire');
            $table->integer('to_niveau_id');
            $table->integer('to_classe_id');
            $table->integer('to_section_id');
            $table->integer('annee_an_scolaire');

            $table->timestamps();
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
