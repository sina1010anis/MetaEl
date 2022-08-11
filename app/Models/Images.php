<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model implements DefaultModel
{
    use HasFactory;
    protected $guarded =[];
    protected $attributes = ['status' => 1];
    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }
}
