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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('datenaissance');
            $table->text('adresse');
            $table->string('genre');
            $table->string('nationalite');
            $table->unsignedBigInteger('parentt_id');
            $table->unsignedBigInteger('niveau_id');
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('section_id');
            $table->timestamps();

            $table->foreign('parentt_id')->references('id')->on('parentts')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('etudiants');
    }
};
