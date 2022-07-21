<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements DefaultModel
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $attributes = ['address_id' => 0];
    public function adresss()
    {
        return $this->belongsTo(Address::class , 'address_id' , 'id');
    }
    public function cart()
    {
        return $this->hasMany(User::class , 'user_id' , 'id');
    }
    public function comment_product()
    {
        return $this->hasMany(CommentProduct::class , 'user_id' , 'id');
    }
    public function comment_panel()
    {
        return $this->hasMany(CommentPanel::class , 'user_id' , 'id');
    }
    public function support()
    {
        return $this->hasMany(Support::class , 'user_id' , 'id');
    }
    public function reply_comment()
    {
        return $this->hasMany(ReplyComment::class , 'user_id' , 'id');
    }
    public function save_product(){
        return $this->hasMany(SaveProduct::class , 'user_id' , 'id');
    }
    public function return_product(){
        return $this->hasMany(ReturnProduct::class , 'user_id' , 'id');
    }
    public function code()
    {
        return $this->belongsTo(DiscountCode::class , 'user_id' , 'id');
    }
}
