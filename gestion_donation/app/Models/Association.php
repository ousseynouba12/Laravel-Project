<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    protected $fillable = [
        'nom', 'montantTotal',
    ];

    // Une association peut recevoir plusieurs dons
    public function dons()
    {
        return $this->hasMany(Don::class);
    }

    //
}
