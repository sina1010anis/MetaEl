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
            'vote' => $request->vote * 10,
            'product_id' => $request->product_id,
            'user_id' => auth()->user()->id,
        ];
    }
    public function data_attr_comment(Request $request , $id)
    {
        return $dataComment = [
            'step_1' => $request->step_1,
            'step_2' => $request->step_2,
            'step_3' => $request->step_3,
            'step_4' => $request->step_4,
            'comment_id' => $id,
        ];
    }
}
