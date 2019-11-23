<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    //
    protected $fillable = ['memo', 'importance', 'is_removed'];

    public function user()
    {
        return $this->belongTo('App\User');
    }
}
