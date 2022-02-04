<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    public $timestamps = true;
    protected $fillable = [
        'nom',
        'unitaire',
        'prix',
        'desc',
        'observations',
    ];

    // returns the instance of the bc who is owner of that articles
    public function boncommande()
    {
        return $this->belongsTo('App\Models\Boncommande', 'boncommande_id');
    }
}
