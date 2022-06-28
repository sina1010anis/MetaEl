<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\ProductResources;
use App\Http\Resources\PriceProductResources;
class CartResources extends ResourceCollection
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
                $size = $item->product;
                return [
                    'id' => $item->id,
                    'total_price' => $item->total_price,
                    'number' => $item->number,
                    'user_id' => $item->user_id,
                    'created_at' => $item->created_at,
                    'size_product' => new PriceProductResources($size),
                ];
            })
        ];
    }
}
