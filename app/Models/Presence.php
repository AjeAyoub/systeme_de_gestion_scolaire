<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'etudiant_id','matiere_id','start','end', 'raison_absence'];

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }
}
