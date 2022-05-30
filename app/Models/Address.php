<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function state()
    {
        return $this->belongsTo(State::class , 'state_id' , 'id');
    }
    public function city()
    {
        return $this->belongsTo(City::class , 'city_id' , 'id');
    }
    public function user()
    {
        return $this->hasMany(User::class , 'address_id' , 'id');
    }
}
