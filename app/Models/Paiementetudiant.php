<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiementetudiant extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'etudiant_id', 'cout_id', 'date', 'statut', 'mode', 'remarque'];

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
    public function cout(){
        return $this->belongsTo(Cout::class);
    }
}
