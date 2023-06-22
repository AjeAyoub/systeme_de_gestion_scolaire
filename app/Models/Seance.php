<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nom', 'description', 'duree', 'enseignant_id', 'matiere_id', 'salle_id'];

    public function enseignant(){

        return $this->belongsTo(Enseignant::class);
    }

    public function matiere(){

        return $this->belongsTo(Matiere::class); 
    }
    public function salle(){

        return $this->belongsTo(Salle::class); 
    }
}
