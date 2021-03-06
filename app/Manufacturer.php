<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = [
        'name'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
