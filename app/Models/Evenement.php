<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id',
        'nom',
        'date',
        'description',
        'niveau_id',
        'classe_id',
        'section_id',
        'cout_id'
    ];

    
    public function niveau(){
        
        return $this->belongsTo(Niveau::class); 
    }
    
    public function classe(){
        
        return $this->belongsTo(Classe::class);
    }
    
    public function section(){
        
        return $this->belongsTo(Section::class); 
    }
    public function cout(){
    
        return $this->belongsTo(Cout::class);
    }
}
