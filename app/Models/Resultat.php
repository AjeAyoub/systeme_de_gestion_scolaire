<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    use HasFactory;

    
    protected $fillable = ['id', 'etudiant_id', 'file'];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
