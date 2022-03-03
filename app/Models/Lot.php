<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;
    protected $table = 'lots';
    public $timestamps = true;
    protected $fillable = [
        'raison_social',
        'ville',
        'color',
        'raison_social_ar',
    ];
}
