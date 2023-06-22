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
            $table->integer('etudiant_id');
            $table->integer('cout_id');
            $table->date('date');
            $table->string('statut');
            $table->string('mode');
            $table->string('remarque');
            $table->timestamps();
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
