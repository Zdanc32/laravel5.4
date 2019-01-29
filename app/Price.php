<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['product_dwfk', 'price'];
    protected $table = 'prices';
    protected $primaryKey = 'dwid';
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
