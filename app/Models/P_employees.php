<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P_employees extends Model
{
    use HasFactory;
    protected $table = 'paiementemployees';
    public $timestamps = true;
    protected $fillable = [
        'employee_id',
        'debut',
        'fin',
        'observation',
        'n_jours',
        'prix_jour',
        'salaire_total',
        'realise_par',
        'is_payee' => 'boolean',
    ];
}
