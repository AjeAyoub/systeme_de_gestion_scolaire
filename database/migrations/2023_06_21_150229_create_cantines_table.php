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
        Schema::create('cantines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etudiant_id');
            $table->date('date');
            $table->time('heure');
            $table->unsignedBigInteger('repa_id');
            $table->unsignedBigInteger('cout_id');
            $table->string('statut');
            $table->timestamps();

            $table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('repa_id')->references('id')->on('repas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cout_id')->references('id')->on('couts')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cantines');
    }
};
