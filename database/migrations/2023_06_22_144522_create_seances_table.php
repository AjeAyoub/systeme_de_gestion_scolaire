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
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
            $table->decimal('duree',8, 2);
            $table->unsignedBigInteger('enseignant_id');
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('salle_id');
            $table->timestamps();

            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seances');
    }
};
