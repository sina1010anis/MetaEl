<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comment_product()
    {
        return $this->belongsTo(CommentProduct::class , 'comment_product_id' , 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function getCreatedAtAttribute($val)
    {
        return jdate($val)->format('%B %d، %Y');
    }
}
