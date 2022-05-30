<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Off extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sub_menu()
    {
        return $this->belongsTo(SunMenu::class , 'sub_menu_id' , 'id');
    }
}
