<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }

    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }

    public function auto()
    {
        return $this->belongsTo('App\Auto');
    }

    public function getImagesAttribute($value)
    {
        return preg_split('/,/', $value, -1, PREG_SPLIT_NO_EMPTY);
    }

    public function setImagesAttribute($images)
    {
        $this->attributes['images'] = implode(',', $images);
    }

    public function basket()
    {
        return $this->hasManyThrough('App\User', 'App\Basket');
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }
}
