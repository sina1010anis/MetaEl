<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceSend extends Model implements DefaultModel
{
    use HasFactory;

    protected $guarded = [];

    public function cart(){
        return $this->hasMany(Cart::class , 'size_product_id' , 'id'); 
    }
    public function product(){
        return $this->belongsTo(Product::class , 'product_id' , 'id'); 
    }
}
