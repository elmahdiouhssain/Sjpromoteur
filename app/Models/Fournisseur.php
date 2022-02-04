<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $table = 'fournisseurs';
    public $timestamps = true;
    protected $fillable = [
        'boncommande_id',
        'raison_s',
        'ice',
        'addr1',
        'n_telephone',
        'email',
        'c_bancaire',
        'observations',
    ];


    // fournisseur has many bonscommandes
    public function bonscommandes()
    {
        return $this->hasMany('App\Models\Boncommande', 'boncommande_id');
    } 
    
}
