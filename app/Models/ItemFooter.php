<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemFooter extends Model implements DefaultModel
{
    use HasFactory;

    protected $guarded=[];

    public function title_footer()
    {
        return $this->belongsTo(TitleFooter::class , 'title_footer' , 'id');
    }
}
