<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $fillable = [
        'armenian', 'english', 'user_id'
    ];


    public function user()
    {
         return $this->belongsTo('App\User');
    }
}
