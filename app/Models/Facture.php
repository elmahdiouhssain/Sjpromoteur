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
        'uuid',
        'company_id',
        'fournisseurs_id',
        'reference',
        'f_libelle',
        'type_facture',
        'relase_date',
        'total_ht',
        'total_tva',
        'total_ttc',
        'pdf_url',
        'realise_par',
        'is_paid' => 'boolean',
        
    ];


    }
