<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_factor extends Model implements DefaultModel
{
    use HasFactory;
    protected $guarded=[];

    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }
    public function factor()
    {
        return $this->belongsTo(factor::class , 'factor_id' , 'id');
    }
}
