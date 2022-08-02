<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filter_product extends Model implements DefaultModel
{
    use HasFactory;

    protected $guarded =[];
    public function filter()
    {
        return $this->belongsTo(filter::class , 'filter_id' , 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }
    public function title_filter()
    {
        return  $this->belongsTo(title_filter::class , 'title_filter_id' , 'id');
    }
}
