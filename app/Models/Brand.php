<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model implements DefaultModel
{
    use HasFactory;
    protected $guarded=[];

    public function product()
    {
        return $this->hasMany(Product::class , 'product_id' , 'id');
    }
}
