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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('salle_id');
            $table->date('date');
            $table->time('heure');
            $table->timestamps();

            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
