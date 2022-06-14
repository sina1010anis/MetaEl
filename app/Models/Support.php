<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model implements DefaultModel
{
    use HasFactory;

    protected $guarded = [];

    protected $attributes = ['role' => 0];
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
