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
            $table->integer('etudiant_id');
            $table->date('date');
            $table->time('heure');
            $table->integer('repa_id');
            $table->integer('cout_id');
            $table->string('statut');
            $table->timestamps();

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
