<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'etudiant_id', 'numero', 'cout_id', 'statut'];

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
    public function cout(){
        return $this->belongsTo(Cout::class);
    }
}
