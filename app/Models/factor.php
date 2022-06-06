<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product_factor()
    {
        return $this->hasMany(product_factor::class , 'factor_id' , 'id');
    }
}
