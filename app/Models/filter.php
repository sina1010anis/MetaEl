<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function title_filter()
    {
        return $this->belongsTo(title_filter::class , 'title_filter_id' , 'id');
    }
}
