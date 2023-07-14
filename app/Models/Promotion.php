<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function etudiant(){
        
        return $this->belongsTo(Etudiant::class);
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
    public function vers_niveau(){
    
        return $this->belongsTo(Niveau::class);
    }
    public function vers_classe(){
    
        return $this->belongsTo(Classe::class);
    }
    public function vers_section(){
    
        return $this->belongsTo(Section::class);
    }
}
