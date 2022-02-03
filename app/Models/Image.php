<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    public $timestamps = true;
    protected $fillable = [
        'adherant_id',
        'name',
        'image_path',
        'file_type',

    ];

    // returns the instance of the adherant who is owner of that demandes
    public function adherant()
    {
        return $this->belongsTo('App\Models\Adherant', 'adherant_id');
    }

    public function cheque()
    {
        return $this->belongsTo('App\Models\Cheque', 'cheque_id');
    }
   

}