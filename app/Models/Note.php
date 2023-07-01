<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'matiere_id','etudiant_id', 'note'];

    public function matiere(){

        return $this->belongsTo(Matiere::class);
    }
    public function etudiant(){

        return $this->belongsTo(Etudiant::class);
    }

}
