<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donateur extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'email', 'password', 'ddn', 'sexe',
    ];

    // Un donateur peut effectuer plusieurs dons
    public function dons()
    {
        return $this->hasMany(Don::class);
    }

    //
}
