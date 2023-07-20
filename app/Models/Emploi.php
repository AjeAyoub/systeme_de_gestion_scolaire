<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'niveau_id', 'classe_id', 'section_id','file'];
 
    public function niveau(){

        return $this->belongsTo(Niveau::class); 
    }

    public function classe(){

        return $this->belongsTo(Classe::class);
    }

    public function section(){

        return $this->belongsTo(Section::class);
    }
}
