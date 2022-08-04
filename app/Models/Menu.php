<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model implements DefaultModel
{
    use HasFactory;
    public $table = 'b_menus';
    protected $guarded = [];
    public function sub_menu()
    {
        return $this->hasMany(SunMenu::class , 'menu_id' , 'id');
    }
    public function title_filter()
    {
        return $this->hasMany(title_filter::class , 'menu_id' , 'id');
    }
}
