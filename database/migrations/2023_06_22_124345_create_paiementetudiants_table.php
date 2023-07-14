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
        Schema::create('paiementetudiants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etudiant_id');
            $table->unsignedBigInteger('cout_id');
            $table->date('date');
            $table->string('statut');
            $table->string('mode');
            $table->string('remarque');
            $table->timestamps();

            $table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cout_id')->references('id')->on('couts')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiementetudiants');
    }
};
