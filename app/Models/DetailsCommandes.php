<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsCommandes extends Model
{
    protected $table = 'detailscommandes';

    protected $fillable = ['nom','quantite','prix','sous_total','total','commandes_id'];
    use HasFactory;
    public function commande()
    {
        return $this->belongsTo(Commandes::class, 'commandes_id');
    }


}

