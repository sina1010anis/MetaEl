<?php

namespace App\Repository\Front\Comment;

use App\Http\Requests\NewCommentRequest;
use App\Models\AttrComment;
use App\Models\CommentProduct as CommentProductModel ;
use App\Repository\Front\Data\Created;

trait CommentProduct
{
    use SetupCommentProduct , Created;
    public function comment_new(NewCommentRequest $request , CommentProductModel $CommentProductModel , AttrComment $attrComment)
    {
        $this->create($CommentProductModel , $this->data_comment($request));
        $this->create($attrComment , $this->data_attr_comment($request , $this->dataCreate->id));
        return 'ok';
    }
}
