<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    protected $fillable = ['prenom_nom','adresse','telephone','email','statue'];

    use HasFactory;
    public function detailscommandes()
    {
        return $this->hasMany(Commandes::class);
    }
}

