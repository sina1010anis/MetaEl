<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitleFooter extends Model
{
    use HasFactory;

    protected $guarded =[];
    public function item_footer()
    {
        return $this->hasMany(ItemFooter::class , 'title_footer' , 'id');
    }
}
