<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificat extends Model
{
    use HasFactory;
    protected $table = 'certs';
    public $timestamps = true;
    protected $fillable = [
        'cert_titre',
        'cert_body',
        'created_by',
    ];
}
