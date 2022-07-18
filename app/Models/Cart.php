<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model implements DefaultModel
{
    use HasFactory;

    protected $guarded=[];

    protected $attributes = ['status' => 0];

    public function product()
    {
        return $this->belongsTo(PriceProduct::class , 'size_product_id' , 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
