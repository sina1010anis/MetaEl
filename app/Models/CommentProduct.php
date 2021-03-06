<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentProduct extends Model implements DefaultModel
{
    use HasFactory;

    protected $guarded=[];
    public function attr_comment()
    {
        return $this->hasMany(AttrComment::class , 'comment_id' , 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }
    public function reply_comment()
    {
        return $this->hasMany(ReplyComment::class , 'comment_product_id' , 'id');
    }
    public function getCreatedAtAttribute($val)
    {
        return jdate($val)->format('%B %d، %Y');
    }
}
