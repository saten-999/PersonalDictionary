<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dictionary extends Model
{
    use HasFactory;

    protected $fillable = [
        'armenian', 'english', 'user_id'
    ];


    public function user()
    {
         return $this->belongsTo('App\User');
    }
}
