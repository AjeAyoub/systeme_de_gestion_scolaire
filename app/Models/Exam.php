<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'matiere_id','salle_id', 'date', 'heure'];

    public function matiere(){

        return $this->belongsTo(Matiere::class);
    }

    public function salle(){

        return $this->belongsTo(Salle::class); 
    }
    
      
}
