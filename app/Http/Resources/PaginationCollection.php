<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PaginationCollection extends ResourceCollection
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
            'data' => $this->collection->map(function ($order) use ($request) {
                return (new CardResource($order))->toArray($request);
            })
        ];
    }
 
 
    public function with($request)
    {
        return [
            'included' => $this->collection->pluck('product')->unique()->values()->map(function ($product) {
                return new CardResource($product);
            })
        ];
    }
}
