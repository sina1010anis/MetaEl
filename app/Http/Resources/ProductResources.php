<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
                    'id' => $this->id,
                    'name' => $this->name,
                    'slug' => $this->slug,
                    'price' => $this->price,
                    'image' => $this->image,
                    'created_at' => $this->created_at,
        ];
    }
}
