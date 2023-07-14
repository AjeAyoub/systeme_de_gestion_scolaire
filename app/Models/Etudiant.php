<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id',
        'nom',
        'prenom',
        'datenaissance',
        'adresse',
        'genre',
        'nationalite',
        'parentt_id',
        'niveau_id',
        'classe_id',
        'section_id'
    ];

    public function parentt(){

        return $this->belongsTo(Parentt::class);
    }

    public function niveau(){

        return $this->belongsTo(Niveau::class); 
    }

    public function classe(){

        return $this->belongsTo(Classe::class);
    }

    public function section(){

        return $this->belongsTo(Section::class); 
    }
    public function dashboard(){

        return $this->belongsTo(Dashboard::class); 
    }

}
