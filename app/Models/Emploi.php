<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'departement_id','enseignant_id', 'niveau_id', 'classe_id', 'section_id', 'salle_id', 'jour_semaine', 'heure_debut', 'heure_fin'];

    public function departement(){

        return $this->belongsTo(Departement::class);
    }

    public function enseignant(){

        return $this->belongsTo(Enseignant::class); 
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
    public function salle(){

        return $this->belongsTo(Salle::class);
    }
}
