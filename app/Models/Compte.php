<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','password','role'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
