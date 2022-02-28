<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adherant extends Model
{
    use HasFactory;
    protected $table = 'adherants';
    public $timestamps = true;
    protected $fillable = [
        'nom_complete',
        'montant_verse',
        'realise_par',
        'facade',
        'cote',
        'bloc',
        'gsm',
        'm2',
        'pm2',
        'sous_sol' => 'boolean',
        'is_canceled' => 'boolean',
        'observation',
        'commerciale',
        'etage',
        'societe_id',
        'imm_type',
        ////////certificat section//////
        'ar_name',
        'id_national',
        'ar_facade',
        'ar_immtype',
        'ville',
        'n_dossier',
    ];

    // adherant has many tranches
    public function tranches()
    {
        return $this->hasMany('App\Models\Tranche', 'adherant_id');
    } 

    // adherant has many demandes
    public function demandes()
    {
        return $this->hasMany('App\Models\Demande', 'adherant_id');
    } 

    // adherant has many images
    public function documents()
    {
        return $this->hasMany('App\Models\Image', 'adherant_id');
    } 
    


}
