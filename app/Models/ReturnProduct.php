<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function return_product(){
        return $this->hasMany(ReturnProductItem::class , 'return_product_id' , 'id');
    }
}
