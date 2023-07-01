<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    use HasFactory;

    
    protected $fillable = ['id', 'matiere_id','etudiant_id', 'note_matiere', 'note_examen', 'note_finale', 'statut', 'option'];

    public function matiere(){

        return $this->belongsTo(Matiere::class);
    }
    public function etudiant(){

        return $this->belongsTo(Etudiant::class);
    }
}
