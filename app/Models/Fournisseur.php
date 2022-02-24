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
        'realise_par',
    ];


}
