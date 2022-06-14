<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model implements DefaultModel
{
    use HasFactory;
    protected $guarded = [];
    public function addresss()
    {
        return $this->hasMany(Address::class , 'state_id' , 'id');
    }
    public function city()
    {
        return $this->belongsTo(City::class , 'city_id' , 'id');
    }
}
