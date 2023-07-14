<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cantine extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'etudiant_id', 'date', 'heure', 'repa_id', 'cout_id', 'statut'];

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
    public function repa(){
        return $this->belongsTo(Repa::class);
    }
    public function cout(){
        return $this->belongsTo(Cout::class);
    }
  
}
