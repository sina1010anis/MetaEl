<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_factor extends Model implements DefaultModel
{
    use HasFactory;
    protected $guarded=[];

    public function price_product()
    {
        return $this->belongsTo(PriceProduct::class , 'size_product_id' , 'id');
    }
    public function factor()
    {
        return $this->belongsTo(factor::class , 'factor_id' , 'id');
    }
}
