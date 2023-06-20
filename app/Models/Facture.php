<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'etudiant_id', 'date', 'cout_id', 'statut', 'description'];

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
    public function cout(){
        return $this->belongsTo(Cout::class);
    }
}
