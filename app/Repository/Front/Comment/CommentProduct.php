<?php

namespace App\Repository\Front\Comment;

use App\Http\Requests\NewCommentRequest;
use App\Http\Requests\ReplyCommentRequest;
use App\Models\AttrComment;
use App\Models\CommentProduct as CommentProductModel ;
use App\Models\Product;
use App\Models\ReplyComment;
use App\Repository\Front\Data\CountItemDataBase;
use App\Repository\Front\Data\Created;
use App\Repository\Front\QueryDatabase;
use phpDocumentor\Reflection\Types\Void_;

trait CommentProduct
{
    use QueryDatabase , Created , CountItemDataBase;
    public function comment_new(NewCommentRequest $request , CommentProductModel $CommentProductModel , AttrComment $attrComment , Product $product)
    {
        if (auth()->check() and $this->getCount($product , ['id' => $request->product_id]) == 1)
            $this->create($CommentProductModel , $this->data_comment($request));
            $this->create($attrComment , $this->data_attr_comment($request , $this->dataCreate->id));
            return redirect()->back();
    }

    public function reply_comment_new(ReplyCommentRequest $request , ReplyComment $replyComment , CommentProductModel $commentProduct)
    {
        if (auth()->check() and $this->getCount($commentProduct , ['id' => $request->comment_product_id]) == 1){
            $this->create($replyComment ,$this->data_reply_comment($request));
            return  redirect()->back();
        }else{
            return abort(404);
        }
    }
}
