<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public function auto()
    {
        return $this->hasMany('App\Auto');
    }
}
