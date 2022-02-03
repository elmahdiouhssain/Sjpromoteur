<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;
    protected $table = 'cheques';
    public $timestamps = true;
    protected $fillable = [
        'date_cheque',
        'type_op',
        'designation',
        'verse_par',
        'n_marche',
        'debit',
        'credit',
        'realise_par',
        'societe',
    ];

    public function documents()
    {
        return $this->hasMany('App\Models\Image', 'cheque_id');
    } 


}
