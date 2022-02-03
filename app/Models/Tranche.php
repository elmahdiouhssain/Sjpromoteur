<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranche extends Model
{
    use HasFactory;
    protected $table = 'tranches';
    public $timestamps = true;
    protected $fillable = [
        'observation',
        'montant_verse',
        'created_by',
    ];



    // returns the instance of the adherant who is owner of that tranches
    public function adherant()
    {
        return $this->belongsTo('App\Models\Adherant', 'adherant_id');
    }
}


