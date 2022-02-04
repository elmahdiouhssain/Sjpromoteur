<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boncommande extends Model
{
    use HasFactory;
    protected $table = 'boncommandes';
    public $timestamps = true;
    protected $fillable = [
        'article_id',
        'numero',
        'date_bc',
        'lieu',
        'n_tele',
        'total_ht',
        'total_tva',
        'total_ttc',
        'realise_par',
        'valide' => 'boolean',

    ];

    public function fournisseur()
    {
        return $this->belongsTo('App\Models\Fournisseur', 'fournisseur_id');
    }

    // Bc has many articles
    public function articles()
    {
        return $this->hasMany('App\Models\Article', 'article_id');
    } 

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'fournisseur_id');
    }

}
