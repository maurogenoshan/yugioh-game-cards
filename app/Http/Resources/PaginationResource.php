<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderCollection
{
   public function toArray($request)
   {
       return [
           'data' => $this->collection->map(function ($order) use ($request) {
               return (new OrderResource($order))->toArray($request);
           })
       ];
   }


   public function with($request)
   {
       return [
           'included' => $this->collection->pluck('product')->unique()->values()->map(function ($product) {
               return new ProductResource($product);
           })
       ];
   }
}
