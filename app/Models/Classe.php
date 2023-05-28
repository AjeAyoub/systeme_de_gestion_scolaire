<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'phase_id'];

    public function phase(){

        return $this->belongsTo(Phase::class);
    }
}