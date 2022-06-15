<?php

namespace App\Repository\Front\Data;

use Illuminate\Http\Request;

trait Created
{
    public function data_comment(Request $request)
    {
        return $dataComment = [
            'subject' => $request->subject,
            'text' => $request->text,
            'vote' => $request->vote ,
            'product_id' => $request->product_id,
            'user_id' => auth()->user()->id,
        ];
    }
    public function data_attr_comment(Request $request , $id)
    {
        return $dataComment = [
            'step_1' => $request->step_1 * 10,
            'step_2' => $request->step_2 * 10,
            'step_3' => $request->step_3 * 10,
            'step_4' => $request->step_4 * 10,
            'comment_id' => $id,
        ];
    }
    public function data_reply_comment(Request $request)
    {
        return $dataComment = [
            'text' => $request->text ,
            'comment_product_id' => $request->comment_product_id,
            'user_id' => auth()->user()->id,
        ];
    }
    public function data_save_product($id){
        return [
            'product_id' => $id ,
            'user_id' => auth()->user()->id,
        ];
    }
}
