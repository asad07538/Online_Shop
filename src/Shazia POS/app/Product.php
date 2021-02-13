<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $dates = [
        'buying_date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function purchases()
    {
        return $this->hasMany(PurchaseProducts::class,'product_id','id');
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id','id');
    }
    public function phone_model()
    {
        return $this->belongsTo(PhoneModel::class,'phone_model_id','id');
    }
    public function images()
    {
        return $this->hasMany(ProductImages::class,'product_id','id');
    }
}
