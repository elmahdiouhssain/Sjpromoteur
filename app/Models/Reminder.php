<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;
    protected $table = 'reminders';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'title',
        'start',
        'end',
        'observation',
        'is_confirme' => 'boolean',
        'mobile_no',
        'dater',
        'timer',
        'message',
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
