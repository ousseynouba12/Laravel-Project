<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Don extends Model
{
    protected $fillable = [
        'montant', 'date', 'type', 'donateur_id', 'association_id',
    ];

    // Un don appartient à un donateur
    public function donateur()
    {
        return $this->belongsTo(Donateur::class);
    }

    // Un don appartient à une association
    public function association()
    {
        return $this->belongsTo(Association::class);
    }

    //
}
