<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'product_description'];
    protected $table = 'products';
    protected $primaryKey = 'product_dwid';

    public function prices()
    {
        return $this->hasMany(Price::class, 'product_dwfk');
    }
}
