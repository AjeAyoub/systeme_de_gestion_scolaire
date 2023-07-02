<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'etudiant_id', 'niveau_id', 'classe_id', 'section_id', 'annee_scolaire', 'to_niveau_id', 'to_classe_id', 'to_section_id', 'annee_an_scolaire'];

    public function etudiant(){
        
        return $this->belongsTo(Etudiant::class);
    }
    public function niveau(){
    
        return $this->belongsTo(Niveau::class);
    }
    public function classe(){
    
        return $this->belongsTo(Classe::class);
    }
    public function section(){
    
        return $this->belongsTo(Section::class);
    }
}
