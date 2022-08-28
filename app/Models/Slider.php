<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model implements DefaultModel
{
    use HasFactory;

    protected $guarded = [];
    protected $attributes = ['sub_menu_id' => 0 , 'location' => 0];
    public function sub_menu()
    {
        return $this->belongsTo(SunMenu::class , 'sub_menu_id' , 'id');
    }
}
