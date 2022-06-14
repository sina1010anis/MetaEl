<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model implements DefaultModel
{
    use HasFactory;

    protected $guarded=[];
    public function adresss()
    {
        return $this->hasMany(Address::class , 'city_id' , 'id');
    }
    public function state()
    {
        return $this->hasMany(State::class , 'city_id' , 'id');
    }
}
