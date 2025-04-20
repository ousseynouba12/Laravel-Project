<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Donateur extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nom', 'prenom', 'email', 'password', 'ddn', 'sexe',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Un donateur peut effectuer plusieurs dons
    public function dons()
    {
        return $this->hasMany(Don::class);
    }

    //
}
