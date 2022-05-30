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
        return $this->belongsTo(DatailProduct::class , 'product_id' , 'id');
    }
    public function sub_menu()
    {
        return $this->belongsTo(SunMenu::class , 'sub_menu_id' , 'id');
    }
}
