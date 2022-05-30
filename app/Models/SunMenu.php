<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SunMenu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function off()
    {
        return $this->belongsTo(Off::class , 'sub_menu_id' , 'id');
    }
    public function product()
    {
        return $this->hasMany(Product::class , 'sub_menu_id' , 'id');
    }
    public function slider()
    {
        return $this->hasMany(Slider::class , 'sub_menu_id' , 'id');
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class , 'menu_id' , 'id');
    }
}
