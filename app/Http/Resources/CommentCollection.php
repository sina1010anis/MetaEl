<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($item) {
                return [
                    'id' => $item->id,
                    'subject' => $item->subject,
                    'text' => $item->text,
                    'vote' => $item->vote,
                    'created_at' => $item->created_at,
                    'product' => $item->product,
                    'user' => $item->user,
                    //'attr' => $item->attr_comment,
                    'reply' => new ReplyCommentCollection($item->reply_comment),
                ];
            })
        ];
    }
}
