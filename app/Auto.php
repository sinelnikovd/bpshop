<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    public function mark()
    {
        return $this->belongsTo('App\Mark');
    }

    public function product()
    {
        return $this->hasMany('Product');
    }
}
