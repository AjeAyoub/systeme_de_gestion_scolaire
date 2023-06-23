<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controle extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'matiere_id','enseignant_id', 'niveau_id', 'classe_id', 'section_id'];

    public function matiere(){

        return $this->belongsTo(Matiere::class);
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
}
