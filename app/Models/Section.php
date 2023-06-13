<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom', 'niveau_id', 'classe_id'];

    public function classe(){

        return $this->belongsTo(Classe::class);
    }

    public function niveau(){

        return $this->belongsTo(Niveau::class); 
    }
}
