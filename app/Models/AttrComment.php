<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Comment;

class AttrComment extends Model implements DefaultModel
{
    use HasFactory;
    protected $attributes = ['text' => 'null' , 'status' => 1];
    protected $guarded=[];
    public function comment_product()
    {
        return $this->belongsTo(CommentProduct::class , 'comment_id' , 'id');
    }
}
