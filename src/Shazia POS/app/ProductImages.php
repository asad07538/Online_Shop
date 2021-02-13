<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    //
    public function phone_images()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
