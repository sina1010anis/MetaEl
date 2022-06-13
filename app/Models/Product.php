<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cart()
    {
        return $this->hasMany(Cart::class , 'product_id' , 'id');
    }
    public function comment_product()
    {
        return $this->hasMany(CommentProduct::class , 'product_id' , 'id');
    }
    public function datail_product()
    {
        return $this->hasMany(DatailProduct::class , 'product_id' , 'id');
    }
    public function sub_menu()
    {
        return $this->belongsTo(SunMenu::class , 'sub_menu_id' , 'id');
    }
    public function factor()
    {
        return $this->hasMany(factor::class , 'product_id' , 'id');
    }
    public function filter()
    {
        return $this->hasMany(filter_product::class , 'product_id' , 'id');
    }
    public function brand()
    {
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }
    public function images()
    {
        return $this->hasMany(Images::class , 'product_id' , 'id');
    }
    public function price_product()
    {
        return $this->hasMany(PriceProduct::class , 'product_id' , 'id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected function getCreatedAtAttribute($val)
    {
        return jdate($val)->format('%B %d، %Y');
    }
}
