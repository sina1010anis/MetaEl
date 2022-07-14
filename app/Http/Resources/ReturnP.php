<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ReturnP extends ResourceCollection
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
            'data' => $this->collection->map(function($item){
                return [
                    'id' => $item->id,
                    'code' => $item->code,
                    'created_at' => $item->created_at,
                    'item' => new ReturnProductCollection($item->return_product),
                ];
            })
        ];
    }
}
