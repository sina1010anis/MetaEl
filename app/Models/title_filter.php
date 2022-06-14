<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class title_filter extends Model implements DefaultModel
{
    use HasFactory;

    protected $guarded=[];

    public function menu()
    {
        return $this->belongsTo(Menu::class , 'menu_id' , 'id');
    }
}
