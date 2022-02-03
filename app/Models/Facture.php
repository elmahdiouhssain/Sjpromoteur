<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $table = 'factures';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'societe_f',
        'produit_name',
        'telephone',
        'description',
        'quantite',
        'prix_u',
        'total',
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
