<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'etudiant_id', 'raison_absence'];

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
}
