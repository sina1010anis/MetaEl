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
}
