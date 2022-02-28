<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFacture extends Model
{
    use HasFactory;
    protected $table = 'productsfacture';
    public $timestamps = true;
    protected $fillable = [
        'invoice_id',
        'designation',
        'uml',
        'qte',
        'p_u',
        'p_t',
        'p_ttc',
        'p_tva',

    ];
}
