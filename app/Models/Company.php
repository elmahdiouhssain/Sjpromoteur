<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companys';
    public $timestamps = true;
    protected $fillable = [
        'raison_social',
        'logo',
        'details',
        'raison_social_ar',
        'rib',
    ];
}
