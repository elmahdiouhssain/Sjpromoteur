<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $dates = ['date_debut'];
    public $timestamps = true;
    protected $fillable = [
        'nom_complete',
        'cnss',
        'cin',
        'n_telephone',
        'fonction',
        'n_banquer',
        'n_dossier',
        'date_debut',
        'addr1',
        'addr2',
        'observation',
        'n_jours',
        'prix_jour',
        'salaire_total',
        'contract',
        'realise_par',
    ];

    public function paiements()
    {
        return $this->hasMany('App\Models\P_employees', 'employee_id');
    } 
}
