<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequesImg extends Model
{
    use HasFactory;
    protected $table = 'images_cheques';
    public $timestamps = true;
    protected $fillable = [
        'cheque_id',
        'name',
        'image_path',
        'file_type',

    ];
}
